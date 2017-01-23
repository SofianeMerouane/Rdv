<?php

namespace Drupal\eventdispather\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\eventdispather\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($name) {
      
       $email ='sofmerouane@yahoo.fr';
       $name ='sofiane';
       
       $dispatcher = \Drupal::service('event_dispatcher');

        $e = new \Drupal\eventdispather\EventSubscriber\EventAdd($name, $email);
        $event = $dispatcher->dispatch(\Drupal\eventdispather\EventSubscriber\EventAdd::SUBMIT, $e);


        return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello with parameter(s): $name'),
    ];
  }
  
   public function hello1($name) 
  {
    return [
      '#theme' =>'hello2_page',
      '#name' => 'speed media',
     /* '#attached' => [ 
        'css' => [
          drupal_get_path('module', 'eventdispather') . '/assets/css/acme.css'
        ]
      ]*/
   ];
  }
 

}
 