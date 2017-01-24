<?php

namespace Drupal\mymodule;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Oreder entity.
 *
 * @see \Drupal\mymodule\Entity\oreder.
 */
class orederAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\mymodule\Entity\orederInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished oreder entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published oreder entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit oreder entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete oreder entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add oreder entities');
  }

}
