<?php

namespace Drupal\myrdvdoctor\Entity;

use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\RevisionableInterface;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Url;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Patients entities.
 *
 * @ingroup myrdvdoctor
 */
interface patientsInterface extends RevisionableInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Patients name.
   *
   * @return string
   *   Name of the Patients.
   */
  public function getName();

  /**
   * Sets the Patients name.
   *
   * @param string $name
   *   The Patients name.
   *
   * @return \Drupal\myrdvdoctor\Entity\patientsInterface
   *   The called Patients entity.
   */
  public function setName($name);

  /**
   * Gets the Patients creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Patients.
   */
  public function getCreatedTime();

  /**
   * Sets the Patients creation timestamp.
   *
   * @param int $timestamp
   *   The Patients creation timestamp.
   *
   * @return \Drupal\myrdvdoctor\Entity\patientsInterface
   *   The called Patients entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Patients published status indicator.
   *
   * Unpublished Patients are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Patients is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Patients.
   *
   * @param bool $published
   *   TRUE to set this Patients to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\myrdvdoctor\Entity\patientsInterface
   *   The called Patients entity.
   */
  public function setPublished($published);

  /**
   * Gets the Patients revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Patients revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\myrdvdoctor\Entity\patientsInterface
   *   The called Patients entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Patients revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Patients revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\myrdvdoctor\Entity\patientsInterface
   *   The called Patients entity.
   */
  public function setRevisionUserId($uid);

}
