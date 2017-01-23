<?php

namespace Drupal\eventdispather\Entity;

use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\RevisionableInterface;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Url;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Stages entities.
 *
 * @ingroup eventdispather
 */
interface stagesInterface extends RevisionableInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Stages name.
   *
   * @return string
   *   Name of the Stages.
   */
  public function getName();

  /**
   * Sets the Stages name.
   *
   * @param string $name
   *   The Stages name.
   *
   * @return \Drupal\eventdispather\Entity\stagesInterface
   *   The called Stages entity.
   */
  public function setName($name);

  /**
   * Gets the Stages creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Stages.
   */
  public function getCreatedTime();

  /**
   * Sets the Stages creation timestamp.
   *
   * @param int $timestamp
   *   The Stages creation timestamp.
   *
   * @return \Drupal\eventdispather\Entity\stagesInterface
   *   The called Stages entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Stages published status indicator.
   *
   * Unpublished Stages are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Stages is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Stages.
   *
   * @param bool $published
   *   TRUE to set this Stages to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\eventdispather\Entity\stagesInterface
   *   The called Stages entity.
   */
  public function setPublished($published);

  /**
   * Gets the Stages revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Stages revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\eventdispather\Entity\stagesInterface
   *   The called Stages entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Stages revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Stages revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\eventdispather\Entity\stagesInterface
   *   The called Stages entity.
   */
  public function setRevisionUserId($uid);

}
