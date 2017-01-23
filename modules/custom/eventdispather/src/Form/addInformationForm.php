<?php

namespace Drupal\eventdispather\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class addInformationForm.
 *
 * @package Drupal\eventdispather\Form
 */
class addInformationForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'add_information_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

  $form['email'] = array(
    '#type' => 'textfield',
    '#title' => 'mail',
    '#size' => '20',
  );
    $form['name'] = array(
    '#type' => 'textfield',
    '#title' => 'name',
    '#size' => '20',
  );
    
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => 'Subscribe',
  );
  return $form;

    
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
            parent::validateForm($form, $form_state);
             
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }
    
    \Drupal::logger('eventdispatcher')->notice($form_state->getValue('email'));
    \Drupal::logger('test2')->notice($form_state->getValue('name'));
    
    
     //  drupal_set_message($this->t('Your email is'. ['@email' => $form_state->getValue('email')]));
       $email =$form_state->getValue('email');
       $name =$form_state->getValue('name');
      

        $dispatcher = \Drupal::service('event_dispatcher');

        $e = new \Drupal\eventdispather\EventSubscriber\EventAdd($name, $email);
        $event = $dispatcher->dispatch(\Drupal\eventdispather\EventSubscriber\EventAdd::SUBMIT, $e);


  }

}
