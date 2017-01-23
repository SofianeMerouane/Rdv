<?php

namespace Drupal\eventdispather;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
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
class stagesStorage extends SqlContentEntityStorage implements stagesStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(stagesInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {stages_revision} WHERE id=:id ORDER BY vid',
      array(':id' => $entity->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {stages_field_revision} WHERE uid = :uid ORDER BY vid',
      array(':uid' => $account->id())
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(stagesInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {stages_field_revision} WHERE id = :id AND default_langcode = 1', array(':id' => $entity->id()))
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('stages_revision')
      ->fields(array('langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED))
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
