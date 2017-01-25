<?php

namespace Drupal\myrdvdoctor\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Class DefaultController.
 *
 * @package Drupal\myrdvdoctor\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($name) {
    
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: hello with parameter(s): $name'),
    ];
  }
  
  
  public function villeAutocomplite(\Symfony\Component\HttpFoundation\Request $request) {

      
      $like = 'GRENOBLE';

     
     $value = $request->query->get('q') ; 
     $ids =    \Drupal::entityQuery('villes')
                ->condition('name', '%' . db_like($value) . '%', 'LIKE')
                ->execute() ; 
     
     
     
         $villes = \Drupal::entityTypeManager()->getStorage('villes')->loadMultiple($ids) ; 
    
         $matche = [] ;  
         foreach ($villes as $ville ) {
             $matche[] = array(
                 'label' => $ville->name->value , 
                 'value' => $ville->name->value
             ) ; 
         }

  return new \Symfony\Component\HttpFoundation\JsonResponse($matche);
  }
  
  
  

}