<?php

namespace Drupal\eventdispather\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\eventdispather\Entity\stagesInterface;

/**
 * Class stagesController.
 *
 *  Returns responses for Stages routes.
 *
 * @package Drupal\eventdispather\Controller
 */
class stagesController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Stages  revision.
   *
   * @param int $stages_revision
   *   The Stages  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($stages_revision) {
    $stages = $this->entityManager()->getStorage('stages')->loadRevision($stages_revision);
    $view_builder = $this->entityManager()->getViewBuilder('stages');

    return $view_builder->view($stages);
  }

  /**
   * Page title callback for a Stages  revision.
   *
   * @param int $stages_revision
   *   The Stages  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($stages_revision) {
    $stages = $this->entityManager()->getStorage('stages')->loadRevision($stages_revision);
    return $this->t('Revision of %title from %date', array('%title' => $stages->label(), '%date' => format_date($stages->getRevisionCreationTime())));
  }

  /**
   * Generates an overview table of older revisions of a Stages .
   *
   * @param \Drupal\eventdispather\Entity\stagesInterface $stages
   *   A Stages  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(stagesInterface $stages) {
    $account = $this->currentUser();
    $langcode = $stages->language()->getId();
    $langname = $stages->language()->getName();
    $languages = $stages->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $stages_storage = $this->entityManager()->getStorage('stages');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $stages->label()]) : $this->t('Revisions for %title', ['%title' => $stages->label()]);
    $header = array($this->t('Revision'), $this->t('Operations'));

    $revert_permission = (($account->hasPermission("revert all stages revisions") || $account->hasPermission('administer stages entities')));
    $delete_permission = (($account->hasPermission("delete all stages revisions") || $account->hasPermission('administer stages entities')));

    $rows = array();

    $vids = $stages_storage->revisionIds($stages);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\eventdispather\stagesInterface $revision */
      $revision = $stages_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->revision_timestamp->value, 'short');
        if ($vid != $stages->getRevisionId()) {
          $link = $this->l($date, new Url('entity.stages.revision', ['stages' => $stages->id(), 'stages_revision' => $vid]));
        }
        else {
          $link = $stages->link($date);
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
              Url::fromRoute('stages.revision_revert_translation_confirm', ['stages' => $stages->id(), 'stages_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('stages.revision_revert_confirm', ['stages' => $stages->id(), 'stages_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('stages.revision_delete_confirm', ['stages' => $stages->id(), 'stages_revision' => $vid]),
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

    $build['stages_revisions_table'] = array(
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    );

    return $build;
  }

}
