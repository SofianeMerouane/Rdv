<?php

namespace Drupal\mymodule\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\mymodule\Entity\orederInterface;

/**
 * Class orederController.
 *
 *  Returns responses for Oreder routes.
 *
 * @package Drupal\mymodule\Controller
 */
class orederController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Oreder  revision.
   *
   * @param int $oreder_revision
   *   The Oreder  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($oreder_revision) {
    $oreder = $this->entityManager()->getStorage('oreder')->loadRevision($oreder_revision);
    $view_builder = $this->entityManager()->getViewBuilder('oreder');

    return $view_builder->view($oreder);
  }

  /**
   * Page title callback for a Oreder  revision.
   *
   * @param int $oreder_revision
   *   The Oreder  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($oreder_revision) {
    $oreder = $this->entityManager()->getStorage('oreder')->loadRevision($oreder_revision);
    return $this->t('Revision of %title from %date', array('%title' => $oreder->label(), '%date' => format_date($oreder->getRevisionCreationTime())));
  }

  /**
   * Generates an overview table of older revisions of a Oreder .
   *
   * @param \Drupal\mymodule\Entity\orederInterface $oreder
   *   A Oreder  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(orederInterface $oreder) {
    $account = $this->currentUser();
    $langcode = $oreder->language()->getId();
    $langname = $oreder->language()->getName();
    $languages = $oreder->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $oreder_storage = $this->entityManager()->getStorage('oreder');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $oreder->label()]) : $this->t('Revisions for %title', ['%title' => $oreder->label()]);
    $header = array($this->t('Revision'), $this->t('Operations'));

    $revert_permission = (($account->hasPermission("revert all oreder revisions") || $account->hasPermission('administer oreder entities')));
    $delete_permission = (($account->hasPermission("delete all oreder revisions") || $account->hasPermission('administer oreder entities')));

    $rows = array();

    $vids = $oreder_storage->revisionIds($oreder);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\mymodule\orederInterface $revision */
      $revision = $oreder_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->revision_timestamp->value, 'short');
        if ($vid != $oreder->getRevisionId()) {
          $link = $this->l($date, new Url('entity.oreder.revision', ['oreder' => $oreder->id(), 'oreder_revision' => $vid]));
        }
        else {
          $link = $oreder->link($date);
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
              Url::fromRoute('oreder.revision_revert_translation_confirm', ['oreder' => $oreder->id(), 'oreder_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('oreder.revision_revert_confirm', ['oreder' => $oreder->id(), 'oreder_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('oreder.revision_delete_confirm', ['oreder' => $oreder->id(), 'oreder_revision' => $vid]),
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

    $build['oreder_revisions_table'] = array(
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    );

    return $build;
  }

}
