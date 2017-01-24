<?php

namespace Drupal\mymodule;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\mymodule\Entity\orederInterface;

/**
 * Defines the storage handler class for Oreder entities.
 *
 * This extends the base storage class, adding required special handling for
 * Oreder entities.
 *
 * @ingroup mymodule
 */
interface orederStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Oreder revision IDs for a specific Oreder.
   *
   * @param \Drupal\mymodule\Entity\orederInterface $entity
   *   The Oreder entity.
   *
   * @return int[]
   *   Oreder revision IDs (in ascending order).
   */
  public function revisionIds(orederInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Oreder author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Oreder revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\mymodule\Entity\orederInterface $entity
   *   The Oreder entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(orederInterface $entity);

  /**
   * Unsets the language for all Oreder with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
