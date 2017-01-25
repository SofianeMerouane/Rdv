<?php

namespace Drupal\myrdvdoctor\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\myrdvdoctor\Entity\medecinsInterface;

/**
 * Class medecinsController.
 *
 *  Returns responses for Medecins routes.
 *
 * @package Drupal\myrdvdoctor\Controller
 */
class medecinsController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Medecins  revision.
   *
   * @param int $medecins_revision
   *   The Medecins  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($medecins_revision) {
    $medecins = $this->entityManager()->getStorage('medecins')->loadRevision($medecins_revision);
    $view_builder = $this->entityManager()->getViewBuilder('medecins');

    return $view_builder->view($medecins);
  }

  /**
   * Page title callback for a Medecins  revision.
   *
   * @param int $medecins_revision
   *   The Medecins  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($medecins_revision) {
    $medecins = $this->entityManager()->getStorage('medecins')->loadRevision($medecins_revision);
    return $this->t('Revision of %title from %date', array('%title' => $medecins->label(), '%date' => format_date($medecins->getRevisionCreationTime())));
  }

  /**
   * Generates an overview table of older revisions of a Medecins .
   *
   * @param \Drupal\myrdvdoctor\Entity\medecinsInterface $medecins
   *   A Medecins  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(medecinsInterface $medecins) {
    $account = $this->currentUser();
    $langcode = $medecins->language()->getId();
    $langname = $medecins->language()->getName();
    $languages = $medecins->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $medecins_storage = $this->entityManager()->getStorage('medecins');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $medecins->label()]) : $this->t('Revisions for %title', ['%title' => $medecins->label()]);
    $header = array($this->t('Revision'), $this->t('Operations'));

    $revert_permission = (($account->hasPermission("revert all medecins revisions") || $account->hasPermission('administer medecins entities')));
    $delete_permission = (($account->hasPermission("delete all medecins revisions") || $account->hasPermission('administer medecins entities')));

    $rows = array();

    $vids = $medecins_storage->revisionIds($medecins);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\myrdvdoctor\medecinsInterface $revision */
      $revision = $medecins_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->revision_timestamp->value, 'short');
        if ($vid != $medecins->getRevisionId()) {
          $link = $this->l($date, new Url('entity.medecins.revision', ['medecins' => $medecins->id(), 'medecins_revision' => $vid]));
        }
        else {
          $link = $medecins->link($date);
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
              Url::fromRoute('medecins.revision_revert_translation_confirm', ['medecins' => $medecins->id(), 'medecins_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('medecins.revision_revert_confirm', ['medecins' => $medecins->id(), 'medecins_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('medecins.revision_delete_confirm', ['medecins' => $medecins->id(), 'medecins_revision' => $vid]),
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

    $build['medecins_revisions_table'] = array(
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    );

    return $build;
  }

}
