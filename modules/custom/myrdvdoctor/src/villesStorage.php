<?php

namespace Drupal\myrdvdoctor;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
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
class villesStorage extends SqlContentEntityStorage implements villesStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(villesInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {villes_revision} WHERE id=:id ORDER BY vid',
      array(':id' => $entity->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {villes_field_revision} WHERE uid = :uid ORDER BY vid',
      array(':uid' => $account->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(villesInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {villes_field_revision} WHERE id = :id AND default_langcode = 1', array(':id' => $entity->id()))
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('villes_revision')
      ->fields(array('langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED))
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
