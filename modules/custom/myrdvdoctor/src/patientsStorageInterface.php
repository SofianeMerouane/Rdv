<?php

namespace Drupal\myrdvdoctor;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\myrdvdoctor\Entity\patientsInterface;

/**
 * Defines the storage handler class for Patients entities.
 *
 * This extends the base storage class, adding required special handling for
 * Patients entities.
 *
 * @ingroup myrdvdoctor
 */
interface patientsStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Patients revision IDs for a specific Patients.
   *
   * @param \Drupal\myrdvdoctor\Entity\patientsInterface $entity
   *   The Patients entity.
   *
   * @return int[]
   *   Patients revision IDs (in ascending order).
   */
  public function revisionIds(patientsInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Patients author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Patients revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\myrdvdoctor\Entity\patientsInterface $entity
   *   The Patients entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(patientsInterface $entity);

  /**
   * Unsets the language for all Patients with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
