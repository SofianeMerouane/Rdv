<?php

namespace Drupal\eventdispather;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\eventdispather\Entity\studentsInterface;

/**
 * Defines the storage handler class for Students entities.
 *
 * This extends the base storage class, adding required special handling for
 * Students entities.
 *
 * @ingroup eventdispather
 */
interface studentsStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Students revision IDs for a specific Students.
   *
   * @param \Drupal\eventdispather\Entity\studentsInterface $entity
   *   The Students entity.
   *
   * @return int[]
   *   Students revision IDs (in ascending order).
   */
  public function revisionIds(studentsInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Students author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Students revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\eventdispather\Entity\studentsInterface $entity
   *   The Students entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(studentsInterface $entity);

  /**
   * Unsets the language for all Students with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
