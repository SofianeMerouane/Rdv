<?php

namespace Drupal\myrdvdoctor\Entity;

use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\RevisionableInterface;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Url;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Villes entities.
 *
 * @ingroup myrdvdoctor
 */
interface villesInterface extends RevisionableInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Villes name.
   *
   * @return string
   *   Name of the Villes.
   */
  public function getName();

  /**
   * Sets the Villes name.
   *
   * @param string $name
   *   The Villes name.
   *
   * @return \Drupal\myrdvdoctor\Entity\villesInterface
   *   The called Villes entity.
   */
  public function setName($name);

  /**
   * Gets the Villes creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Villes.
   */
  public function getCreatedTime();

  /**
   * Sets the Villes creation timestamp.
   *
   * @param int $timestamp
   *   The Villes creation timestamp.
   *
   * @return \Drupal\myrdvdoctor\Entity\villesInterface
   *   The called Villes entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Villes published status indicator.
   *
   * Unpublished Villes are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Villes is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Villes.
   *
   * @param bool $published
   *   TRUE to set this Villes to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\myrdvdoctor\Entity\villesInterface
   *   The called Villes entity.
   */
  public function setPublished($published);

  /**
   * Gets the Villes revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Villes revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\myrdvdoctor\Entity\villesInterface
   *   The called Villes entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Villes revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Villes revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\myrdvdoctor\Entity\villesInterface
   *   The called Villes entity.
   */
  public function setRevisionUserId($uid);

}
