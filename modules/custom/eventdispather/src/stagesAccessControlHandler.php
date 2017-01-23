<?php

namespace Drupal\eventdispather;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Stages entity.
 *
 * @see \Drupal\eventdispather\Entity\stages.
 */
class stagesAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\eventdispather\Entity\stagesInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished stages entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published stages entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit stages entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete stages entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add stages entities');
  }

}
