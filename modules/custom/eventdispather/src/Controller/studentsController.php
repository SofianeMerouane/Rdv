<?php

namespace Drupal\eventdispather\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\eventdispather\Entity\studentsInterface;

/**
 * Class studentsController.
 *
 *  Returns responses for Students routes.
 *
 * @package Drupal\eventdispather\Controller
 */
class studentsController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Students  revision.
   *
   * @param int $students_revision
   *   The Students  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($students_revision) {
    $students = $this->entityManager()->getStorage('students')->loadRevision($students_revision);
    $view_builder = $this->entityManager()->getViewBuilder('students');

    return $view_builder->view($students);
  }

  /**
   * Page title callback for a Students  revision.
   *
   * @param int $students_revision
   *   The Students  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($students_revision) {
    $students = $this->entityManager()->getStorage('students')->loadRevision($students_revision);
    return $this->t('Revision of %title from %date', array('%title' => $students->label(), '%date' => format_date($students->getRevisionCreationTime())));
  }

  /**
   * Generates an overview table of older revisions of a Students .
   *
   * @param \Drupal\eventdispather\Entity\studentsInterface $students
   *   A Students  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(studentsInterface $students) {
    $account = $this->currentUser();
    $langcode = $students->language()->getId();
    $langname = $students->language()->getName();
    $languages = $students->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $students_storage = $this->entityManager()->getStorage('students');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $students->label()]) : $this->t('Revisions for %title', ['%title' => $students->label()]);
    $header = array($this->t('Revision'), $this->t('Operations'));

    $revert_permission = (($account->hasPermission("revert all students revisions") || $account->hasPermission('administer students entities')));
    $delete_permission = (($account->hasPermission("delete all students revisions") || $account->hasPermission('administer students entities')));

    $rows = array();

    $vids = $students_storage->revisionIds($students);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\eventdispather\studentsInterface $revision */
      $revision = $students_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->revision_timestamp->value, 'short');
        if ($vid != $students->getRevisionId()) {
          $link = $this->l($date, new Url('entity.students.revision', ['students' => $students->id(), 'students_revision' => $vid]));
        }
        else {
          $link = $students->link($date);
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
              Url::fromRoute('students.revision_revert_translation_confirm', ['students' => $students->id(), 'students_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('students.revision_revert_confirm', ['students' => $students->id(), 'students_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('students.revision_delete_confirm', ['students' => $students->id(), 'students_revision' => $vid]),
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

    $build['students_revisions_table'] = array(
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    );

    return $build;
  }

}
