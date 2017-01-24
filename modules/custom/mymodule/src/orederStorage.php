<?php

namespace Drupal\mymodule;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
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
class orederStorage extends SqlContentEntityStorage implements orederStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(orederInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {oreder_revision} WHERE id=:id ORDER BY vid',
      array(':id' => $entity->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {oreder_field_revision} WHERE uid = :uid ORDER BY vid',
      array(':uid' => $account->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(orederInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {oreder_field_revision} WHERE id = :id AND default_langcode = 1', array(':id' => $entity->id()))
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('oreder_revision')
      ->fields(array('langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED))
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
