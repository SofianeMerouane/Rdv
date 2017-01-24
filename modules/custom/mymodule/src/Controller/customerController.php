<?php

namespace Drupal\mymodule\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\mymodule\Entity\customerInterface;

/**
 * Class customerController.
 *
 *  Returns responses for Customer routes.
 *
 * @package Drupal\mymodule\Controller
 */
class customerController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Customer  revision.
   *
   * @param int $customer_revision
   *   The Customer  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($customer_revision) {
    $customer = $this->entityManager()->getStorage('customer')->loadRevision($customer_revision);
    $view_builder = $this->entityManager()->getViewBuilder('customer');

    return $view_builder->view($customer);
  }

  /**
   * Page title callback for a Customer  revision.
   *
   * @param int $customer_revision
   *   The Customer  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($customer_revision) {
    $customer = $this->entityManager()->getStorage('customer')->loadRevision($customer_revision);
    return $this->t('Revision of %title from %date', array('%title' => $customer->label(), '%date' => format_date($customer->getRevisionCreationTime())));
  }

  /**
   * Generates an overview table of older revisions of a Customer .
   *
   * @param \Drupal\mymodule\Entity\customerInterface $customer
   *   A Customer  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(customerInterface $customer) {
    $account = $this->currentUser();
    $langcode = $customer->language()->getId();
    $langname = $customer->language()->getName();
    $languages = $customer->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $customer_storage = $this->entityManager()->getStorage('customer');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $customer->label()]) : $this->t('Revisions for %title', ['%title' => $customer->label()]);
    $header = array($this->t('Revision'), $this->t('Operations'));

    $revert_permission = (($account->hasPermission("revert all customer revisions") || $account->hasPermission('administer customer entities')));
    $delete_permission = (($account->hasPermission("delete all customer revisions") || $account->hasPermission('administer customer entities')));

    $rows = array();

    $vids = $customer_storage->revisionIds($customer);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\mymodule\customerInterface $revision */
      $revision = $customer_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->revision_timestamp->value, 'short');
        if ($vid != $customer->getRevisionId()) {
          $link = $this->l($date, new Url('entity.customer.revision', ['customer' => $customer->id(), 'customer_revision' => $vid]));
        }
        else {
          $link = $customer->link($date);
        }

        $row = [];
        $column = [
          'data' => [
            '#type' => 'inline_template',
            '#template' => '{% trans %}{{ date }} by {{ username }}{% endtrans %}{% if message %}<p class="revision-log">{{ message }}</p>{% endif %}',
            '#context' => [
              'date' => $link,
              'username' => \Drupal::service('renderer')->renderPlain($username),
              'message' => ['#markup' => $revision->revision_log_message->value, '#allowed_tags' => Xss::getHtmlTagList()],
            ],
          ],
        ];
        $row[] = $column;

        if ($latest_revision) {
          $row[] = [
            'data' => [
              '#prefix' => '<em>',
              '#markup' => $this->t('Current revision'),
              '#suffix' => '</em>',
            ],
          ];
          foreach ($row as &$current) {
            $current['class'] = ['revision-current'];
          }
          $latest_revision = FALSE;
        }
        else {
          $links = [];
          if ($revert_permission) {
            $links['revert'] = [
              'title' => $this->t('Revert'),
              'url' => $has_translations ?
              Url::fromRoute('customer.revision_revert_translation_confirm', ['customer' => $customer->id(), 'customer_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('customer.revision_revert_confirm', ['customer' => $customer->id(), 'customer_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('customer.revision_delete_confirm', ['customer' => $customer->id(), 'customer_revision' => $vid]),
            ];
          }

          $row[] = [
            'data' => [
              '#type' => 'operations',
              '#links' => $links,
            ],
          ];
        }

        $rows[] = $row;
      }
    }

    $build['customer_revisions_table'] = array(
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    );

    return $build;
  }

}
