<?php

namespace Drupal\myrdvdoctor;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Medecins entity.
 *
 * @see \Drupal\myrdvdoctor\Entity\medecins.
 */
class medecinsAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\myrdvdoctor\Entity\medecinsInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished medecins entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published medecins entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit medecins entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete medecins entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add medecins entities');
  }

}
