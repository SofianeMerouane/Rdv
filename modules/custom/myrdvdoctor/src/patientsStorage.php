<?php

namespace Drupal\myrdvdoctor;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
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
class patientsStorage extends SqlContentEntityStorage implements patientsStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(patientsInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {patients_revision} WHERE id=:id ORDER BY vid',
      array(':id' => $entity->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {patients_field_revision} WHERE uid = :uid ORDER BY vid',
      array(':uid' => $account->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(patientsInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {patients_field_revision} WHERE id = :id AND default_langcode = 1', array(':id' => $entity->id()))
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('patients_revision')
      ->fields(array('langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED))
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
