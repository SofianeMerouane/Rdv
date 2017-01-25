<?php

namespace Drupal\myrdvdoctor\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\myrdvdoctor\Entity\patientsInterface;

/**
 * Class patientsController.
 *
 *  Returns responses for Patients routes.
 *
 * @package Drupal\myrdvdoctor\Controller
 */
class patientsController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Patients  revision.
   *
   * @param int $patients_revision
   *   The Patients  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($patients_revision) {
    $patients = $this->entityManager()->getStorage('patients')->loadRevision($patients_revision);
    $view_builder = $this->entityManager()->getViewBuilder('patients');

    return $view_builder->view($patients);
  }

  /**
   * Page title callback for a Patients  revision.
   *
   * @param int $patients_revision
   *   The Patients  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($patients_revision) {
    $patients = $this->entityManager()->getStorage('patients')->loadRevision($patients_revision);
    return $this->t('Revision of %title from %date', array('%title' => $patients->label(), '%date' => format_date($patients->getRevisionCreationTime())));
  }

  /**
   * Generates an overview table of older revisions of a Patients .
   *
   * @param \Drupal\myrdvdoctor\Entity\patientsInterface $patients
   *   A Patients  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(patientsInterface $patients) {
    $account = $this->currentUser();
    $langcode = $patients->language()->getId();
    $langname = $patients->language()->getName();
    $languages = $patients->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $patients_storage = $this->entityManager()->getStorage('patients');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $patients->label()]) : $this->t('Revisions for %title', ['%title' => $patients->label()]);
    $header = array($this->t('Revision'), $this->t('Operations'));

    $revert_permission = (($account->hasPermission("revert all patients revisions") || $account->hasPermission('administer patients entities')));
    $delete_permission = (($account->hasPermission("delete all patients revisions") || $account->hasPermission('administer patients entities')));

    $rows = array();

    $vids = $patients_storage->revisionIds($patients);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\myrdvdoctor\patientsInterface $revision */
      $revision = $patients_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->revision_timestamp->value, 'short');
        if ($vid != $patients->getRevisionId()) {
          $link = $this->l($date, new Url('entity.patients.revision', ['patients' => $patients->id(), 'patients_revision' => $vid]));
        }
        else {
          $link = $patients->link($date);
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
              Url::fromRoute('patients.revision_revert_translation_confirm', ['patients' => $patients->id(), 'patients_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('patients.revision_revert_confirm', ['patients' => $patients->id(), 'patients_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('patients.revision_delete_confirm', ['patients' => $patients->id(), 'patients_revision' => $vid]),
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

    $build['patients_revisions_table'] = array(
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    );

    return $build;
  }

}
