<?php

namespace Drupal\eventdispather;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Students entity.
 *
 * @see \Drupal\eventdispather\Entity\students.
 */
class studentsAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\eventdispather\Entity\studentsInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished students entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published students entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit students entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete students entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add students entities');
  }

}
