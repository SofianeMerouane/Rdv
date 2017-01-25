<?php

namespace Drupal\myrdvdoctor\Entity;

use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\RevisionableInterface;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Url;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Medecins entities.
 *
 * @ingroup myrdvdoctor
 */
interface medecinsInterface extends RevisionableInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Medecins name.
   *
   * @return string
   *   Name of the Medecins.
   */
  public function getName();

  /**
   * Sets the Medecins name.
   *
   * @param string $name
   *   The Medecins name.
   *
   * @return \Drupal\myrdvdoctor\Entity\medecinsInterface
   *   The called Medecins entity.
   */
  public function setName($name);

  /**
   * Gets the Medecins creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Medecins.
   */
  public function getCreatedTime();

  /**
   * Sets the Medecins creation timestamp.
   *
   * @param int $timestamp
   *   The Medecins creation timestamp.
   *
   * @return \Drupal\myrdvdoctor\Entity\medecinsInterface
   *   The called Medecins entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Medecins published status indicator.
   *
   * Unpublished Medecins are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Medecins is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Medecins.
   *
   * @param bool $published
   *   TRUE to set this Medecins to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\myrdvdoctor\Entity\medecinsInterface
   *   The called Medecins entity.
   */
  public function setPublished($published);

  /**
   * Gets the Medecins revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Medecins revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\myrdvdoctor\Entity\medecinsInterface
   *   The called Medecins entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Medecins revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Medecins revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\myrdvdoctor\Entity\medecinsInterface
   *   The called Medecins entity.
   */
  public function setRevisionUserId($uid);

}
