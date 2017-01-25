<?php

namespace Drupal\myrdvdoctor\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\myrdvdoctor\Entity\villesInterface;

/**
 * Class villesController.
 *
 *  Returns responses for Villes routes.
 *
 * @package Drupal\myrdvdoctor\Controller
 */
class villesController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Villes  revision.
   *
   * @param int $villes_revision
   *   The Villes  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($villes_revision) {
    $villes = $this->entityManager()->getStorage('villes')->loadRevision($villes_revision);
    $view_builder = $this->entityManager()->getViewBuilder('villes');

    return $view_builder->view($villes);
  }

  /**
   * Page title callback for a Villes  revision.
   *
   * @param int $villes_revision
   *   The Villes  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($villes_revision) {
    $villes = $this->entityManager()->getStorage('villes')->loadRevision($villes_revision);
    return $this->t('Revision of %title from %date', array('%title' => $villes->label(), '%date' => format_date($villes->getRevisionCreationTime())));
  }

  /**
   * Generates an overview table of older revisions of a Villes .
   *
   * @param \Drupal\myrdvdoctor\Entity\villesInterface $villes
   *   A Villes  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(villesInterface $villes) {
    $account = $this->currentUser();
    $langcode = $villes->language()->getId();
    $langname = $villes->language()->getName();
    $languages = $villes->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $villes_storage = $this->entityManager()->getStorage('villes');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $villes->label()]) : $this->t('Revisions for %title', ['%title' => $villes->label()]);
    $header = array($this->t('Revision'), $this->t('Operations'));

    $revert_permission = (($account->hasPermission("revert all villes revisions") || $account->hasPermission('administer villes entities')));
    $delete_permission = (($account->hasPermission("delete all villes revisions") || $account->hasPermission('administer villes entities')));

    $rows = array();

    $vids = $villes_storage->revisionIds($villes);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\myrdvdoctor\villesInterface $revision */
      $revision = $villes_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->revision_timestamp->value, 'short');
        if ($vid != $villes->getRevisionId()) {
          $link = $this->l($date, new Url('entity.villes.revision', ['villes' => $villes->id(), 'villes_revision' => $vid]));
        }
        else {
          $link = $villes->link($date);
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
              Url::fromRoute('villes.revision_revert_translation_confirm', ['villes' => $villes->id(), 'villes_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('villes.revision_revert_confirm', ['villes' => $villes->id(), 'villes_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('villes.revision_delete_confirm', ['villes' => $villes->id(), 'villes_revision' => $vid]),
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

    $build['villes_revisions_table'] = array(
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    );

    return $build;
  }

}
