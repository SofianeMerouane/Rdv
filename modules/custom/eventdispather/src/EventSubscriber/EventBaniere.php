<?php

namespace Drupal\eventdispather\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Response;
/**
 * Class EventBaniere.
 *
 * @package Drupal\eventdispather
 */
class EventBaniere implements EventSubscriberInterface {


    protected $year ; 
    protected $month ; 
    protected $day ; 
    
  /**
   * Constructor.
   */
  public function __construct($year,$month,$day) {
      $this->year = $year ; 
      $this->month = $month ; 
      $this->day = $day ; 
  }

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = ['onResponse'];
    return $events;
  }
  
  public function onResponse(\Symfony\Component\HttpKernel\Event\FilterResponseEvent  $event){
  $date = \Drupal::service('date.formatter');
     
      $date_now = $event->getResponse()->getDate();
     
     
      $date_fin  = \Drupal\Core\Datetime\DrupalDateTime::createFromArray(
                array('year' => $this->year, 'month' => $this->month, 'day' => $this->day)
              );
      $date_diff = $date_fin->format('d') - $date_now->format('d');
     if($date_diff>0){
         
        //drupal_set_message('site en beta j-'.$date_diff);
        $content = $event->getResponse()->getContent();
        $message = '<h1 style="color:red; text-align:center">site en beta j-'.$date_diff.'</h1>';
         $content = preg_replace('#zzzzz#',$message , $content);
        $event->getResponse()->setContent($content) ; 
      
     }
      
     
    
  }


}
