<?php

namespace Drupal\mymodule\Entity;

use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\RevisionableInterface;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Url;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Oreder entities.
 *
 * @ingroup mymodule
 */
interface orederInterface extends RevisionableInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Oreder name.
   *
   * @return string
   *   Name of the Oreder.
   */
  public function getName();

  /**
   * Sets the Oreder name.
   *
   * @param string $name
   *   The Oreder name.
   *
   * @return \Drupal\mymodule\Entity\orederInterface
   *   The called Oreder entity.
   */
  public function setName($name);

  /**
   * Gets the Oreder creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Oreder.
   */
  public function getCreatedTime();

  /**
   * Sets the Oreder creation timestamp.
   *
   * @param int $timestamp
   *   The Oreder creation timestamp.
   *
   * @return \Drupal\mymodule\Entity\orederInterface
   *   The called Oreder entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Oreder published status indicator.
   *
   * Unpublished Oreder are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Oreder is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Oreder.
   *
   * @param bool $published
   *   TRUE to set this Oreder to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\mymodule\Entity\orederInterface
   *   The called Oreder entity.
   */
  public function setPublished($published);

  /**
   * Gets the Oreder revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Oreder revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\mymodule\Entity\orederInterface
   *   The called Oreder entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Oreder revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Oreder revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\mymodule\Entity\orederInterface
   *   The called Oreder entity.
   */
  public function setRevisionUserId($uid);

}
