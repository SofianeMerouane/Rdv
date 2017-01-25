<?php

namespace Drupal\myrdvdoctor\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ChangedCommand;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\InvokeCommand;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class rdvDoctor.
 *
 * @package Drupal\myrdvdoctor\Form
 */
class rdvDoctor extends FormBase {


    

    /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'rdv_doctor';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
      
      
      
     
     $form['name'] = array(
    '#type' => 'textfield',
    '#title' => 'Name',
    '#size' => '20',
    '#required'=>true,     
  );  

    $form['email'] = array(
    '#type' => 'email',
    '#title' => 'Mail',
    '#size' => '20',
    '#required'=>true, 
  );
    
             
     $form['choseVille'] = array(
    '#type' => 'textfield',
    '#title' => 'Chose ville',
    '#autocomplete_route_name' => 'myrdvdoctor.default_controller_ville_autocomplite',
    '#size' => '20',
    '#required' => TRUE,   
  ); 
      
         
     $form['choseDoctor'] = array(
    '#type' => 'textfield',
    '#title' => 'Chose Doctor',
    '#size' => '20',     
    '#required'=>true,      
    
   
  ); 
   
   
       $form['date'] = array(
    '#type' => 'date',
    '#title' => 'Date',
    '#size' => '20',
    '#required'=>true,      
  );
         
      $form['tel'] = array(
    '#type' => 'tel',
    '#title' => 'Telephone',
    '#size' => '20',
    '#required'=>true,      
  );
      
    $form['submit'] = [
        '#type' => 'submit',
        '#value' => t('Confirmer'),
        '#button_type' => 'primary'
    ];

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
 
     
    drupal_set_message('cc');
  }
  
  
  
  


}
