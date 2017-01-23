<?php

namespace Drupal\eventdispather\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class EventContact.
 *
 * @package Drupal\eventdispather
 */
class EventContact implements EventSubscriberInterface {


  /**
   * Constructor.
   */
  public function __construct() {

  }

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {

   // return $events;
  }


}
