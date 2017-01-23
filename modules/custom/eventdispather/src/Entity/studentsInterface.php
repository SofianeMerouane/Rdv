<?php

namespace Drupal\eventdispather\Entity;

use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\RevisionableInterface;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Url;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Students entities.
 *
 * @ingroup eventdispather
 */
interface studentsInterface extends RevisionableInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Students name.
   *
   * @return string
   *   Name of the Students.
   */
  public function getName();

  /**
   * Sets the Students name.
   *
   * @param string $name
   *   The Students name.
   *
   * @return \Drupal\eventdispather\Entity\studentsInterface
   *   The called Students entity.
   */
  public function setName($name);

  /**
   * Gets the Students creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Students.
   */
  public function getCreatedTime();

  /**
   * Sets the Students creation timestamp.
   *
   * @param int $timestamp
   *   The Students creation timestamp.
   *
   * @return \Drupal\eventdispather\Entity\studentsInterface
   *   The called Students entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Students published status indicator.
   *
   * Unpublished Students are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Students is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Students.
   *
   * @param bool $published
   *   TRUE to set this Students to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\eventdispather\Entity\studentsInterface
   *   The called Students entity.
   */
  public function setPublished($published);

  /**
   * Gets the Students revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Students revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\eventdispather\Entity\studentsInterface
   *   The called Students entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Students revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Students revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\eventdispather\Entity\studentsInterface
   *   The called Students entity.
   */
  public function setRevisionUserId($uid);

}
