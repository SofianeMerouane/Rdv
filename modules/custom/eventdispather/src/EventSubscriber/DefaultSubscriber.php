<?php

namespace Drupal\eventdispather\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;


/**
 * Class DefaultSubscriber.
 *
 * @package Drupal\eventdispather
 */
class DefaultSubscriber implements EventSubscriberInterface {

     protected $mailManager;
     protected $logger;
     
     public function __construct(\Drupal\Core\Mail\MailManagerInterface $mailManager, \Drupal\Core\Logger\LoggerChannelFactoryInterface $logger) {
         $this->mailManager = $mailManager ;
         $this->logger = $logger;
     }
    
     /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
      
   $events[EventAdd::SUBMIT][]= array('onRegister', 10);
   $events[EventAdd::SUBMIT][]= array('onRegister1', 10);
  
   
    return $events;
   
  }
  
  
 

public function onRegister(EventAdd $event) {
   


    // All system mails need to specify the module and template key (mirrored
    // from hook_mail()) that the message they want to send comes from.
    $module = 'eventdispather';
    $key = 'default_form';

    // Specify 'to' and 'from' addresses.
    $to = $event->getEmail() ; 
   
    $from ='smerouane78@yahoo.fr' ; 
    $params = null ;
    $send_now = TRUE;
    // Send the mail, and check for success. Note that this does not guarantee
    // message delivery; only that there were no PHP-related issues encountered
    // while sending.
    $result = $this->mailManager->mail($module, $key, $to, null ,  $params, $from, $send_now);
    if ($result['result'] == TRUE) {
      drupal_set_message(t('Your message has been sent.'));
    }
    else {
      drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
    }
    $this->logger->get('eventdispather')->notice('logger is ok'.$event->getName());
  
    
}

public function onRegister1(EventAdd $event) {
  
    


    // All system mails need to specify the module and template key (mirrored
    // from hook_mail()) that the message they want to send comes from.
    $module = 'eventdispather';
    $key = 'default_form';

    // Specify 'to' and 'from' addresses.
    $to = $event->getEmail() ; 
   
    $from ='smerouane78@yahoo.fr' ; 
    $params = null ;
    $send_now = TRUE;
    // Send the mail, and check for success. Note that this does not guarantee
    // message delivery; only that there were no PHP-related issues encountered
    // while sending.
    $result = $this->mailManager->mail($module, $key, $to, null ,  $params, $from, $send_now);
    if ($result['result'] == TRUE) {
      drupal_set_message(t('Your message has been sent.'));
    }
    else {
      drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
    }
  
    $this->logger->get('eventdispather')->notice('logger succefull'.$event->getName());
    
}



}
