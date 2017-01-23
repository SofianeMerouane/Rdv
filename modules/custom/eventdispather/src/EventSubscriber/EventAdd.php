<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Drupal\eventdispather\EventSubscriber;

/**
 * Description of EventAdd
 *
 * @author sofiane
 */
class EventAdd extends \Symfony\Component\EventDispatcher\Event {
    
    Const SUBMIT ='send_add';
    
    protected $name;
    protected $email;
    /**
   * Constructor.
   */
  public function __construct($name, $email) {
      $this->name = $name;
      $this->email = $email;
  }


  public function getName(){
      return $this->name;
  }
  
  public function getEmail(){
      return $this->email;
  }
  
 

}
