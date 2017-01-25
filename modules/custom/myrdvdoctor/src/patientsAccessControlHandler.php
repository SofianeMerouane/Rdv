<?php

namespace Drupal\myrdvdoctor;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Patients entity.
 *
 * @see \Drupal\myrdvdoctor\Entity\patients.
 */
class patientsAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\myrdvdoctor\Entity\patientsInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished patients entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published patients entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit patients entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete patients entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add patients entities');
  }

}
