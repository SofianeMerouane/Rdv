<?php

namespace Drupal\myrdvdoctor;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Villes entity.
 *
 * @see \Drupal\myrdvdoctor\Entity\villes.
 */
class villesAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\myrdvdoctor\Entity\villesInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished villes entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published villes entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit villes entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete villes entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add villes entities');
  }

}
