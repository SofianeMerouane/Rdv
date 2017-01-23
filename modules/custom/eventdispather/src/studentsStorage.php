<?php

namespace Drupal\eventdispather;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
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
class studentsStorage extends SqlContentEntityStorage implements studentsStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(studentsInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {students_revision} WHERE id=:id ORDER BY vid',
      array(':id' => $entity->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {students_field_revision} WHERE uid = :uid ORDER BY vid',
      array(':uid' => $account->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(studentsInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {students_field_revision} WHERE id = :id AND default_langcode = 1', array(':id' => $entity->id()))
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('students_revision')
      ->fields(array('langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED))
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
