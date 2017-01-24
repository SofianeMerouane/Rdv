<?php

namespace Drupal\mymodule;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\mymodule\Entity\customerInterface;

/**
 * Defines the storage handler class for Customer entities.
 *
 * This extends the base storage class, adding required special handling for
 * Customer entities.
 *
 * @ingroup mymodule
 */
class customerStorage extends SqlContentEntityStorage implements customerStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(customerInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {customer_revision} WHERE id=:id ORDER BY vid',
      array(':id' => $entity->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {customer_field_revision} WHERE uid = :uid ORDER BY vid',
      array(':uid' => $account->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(customerInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {customer_field_revision} WHERE id = :id AND default_langcode = 1', array(':id' => $entity->id()))
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('customer_revision')
      ->fields(array('langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED))
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
