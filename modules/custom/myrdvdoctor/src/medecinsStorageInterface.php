<?php

namespace Drupal\myrdvdoctor;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\myrdvdoctor\Entity\medecinsInterface;

/**
 * Defines the storage handler class for Medecins entities.
 *
 * This extends the base storage class, adding required special handling for
 * Medecins entities.
 *
 * @ingroup myrdvdoctor
 */
interface medecinsStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Medecins revision IDs for a specific Medecins.
   *
   * @param \Drupal\myrdvdoctor\Entity\medecinsInterface $entity
   *   The Medecins entity.
   *
   * @return int[]
   *   Medecins revision IDs (in ascending order).
   */
  public function revisionIds(medecinsInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Medecins author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Medecins revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\myrdvdoctor\Entity\medecinsInterface $entity
   *   The Medecins entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(medecinsInterface $entity);

  /**
   * Unsets the language for all Medecins with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
