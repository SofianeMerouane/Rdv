<?php

namespace Drupal\myrdvdoctor;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
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
class medecinsStorage extends SqlContentEntityStorage implements medecinsStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(medecinsInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {medecins_revision} WHERE id=:id ORDER BY vid',
      array(':id' => $entity->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {medecins_field_revision} WHERE uid = :uid ORDER BY vid',
      array(':uid' => $account->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(medecinsInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {medecins_field_revision} WHERE id = :id AND default_langcode = 1', array(':id' => $entity->id()))
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('medecins_revision')
      ->fields(array('langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED))
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
