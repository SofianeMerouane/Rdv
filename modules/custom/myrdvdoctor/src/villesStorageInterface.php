<?php

namespace Drupal\myrdvdoctor;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\myrdvdoctor\Entity\villesInterface;

/**
 * Defines the storage handler class for Villes entities.
 *
 * This extends the base storage class, adding required special handling for
 * Villes entities.
 *
 * @ingroup myrdvdoctor
 */
interface villesStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Villes revision IDs for a specific Villes.
   *
   * @param \Drupal\myrdvdoctor\Entity\villesInterface $entity
   *   The Villes entity.
   *
   * @return int[]
   *   Villes revision IDs (in ascending order).
   */
  public function revisionIds(villesInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Villes author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Villes revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\myrdvdoctor\Entity\villesInterface $entity
   *   The Villes entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(villesInterface $entity);

  /**
   * Unsets the language for all Villes with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
