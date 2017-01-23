<?php

namespace Drupal\eventdispather;

use Drupal\Core\Entity\ContentEntityStorageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\eventdispather\Entity\stagesInterface;

/**
 * Defines the storage handler class for Stages entities.
 *
 * This extends the base storage class, adding required special handling for
 * Stages entities.
 *
 * @ingroup eventdispather
 */
interface stagesStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Stages revision IDs for a specific Stages.
   *
   * @param \Drupal\eventdispather\Entity\stagesInterface $entity
   *   The Stages entity.
   *
   * @return int[]
   *   Stages revision IDs (in ascending order).
   */
  public function revisionIds(stagesInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Stages author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Stages revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\eventdispather\Entity\stagesInterface $entity
   *   The Stages entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(stagesInterface $entity);

  /**
   * Unsets the language for all Stages with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
