<?php

namespace Drupal\myrdvdoctor\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Drupal\Console\Command\Shared\CommandTrait;
use Drupal\Console\Style\DrupalStyle;

/**
 * Class DefaultCommand.
 *
 * @package Drupal\myrdvdoctor
 */
class DefaultCommand extends Command {

  use CommandTrait ;

  /**
   * {@inheritdoc}
   */
  protected function configure() {
    $this
      ->setName('debug')
      ->setDescription($this->trans('commands.debuug.description'));
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $io = new DrupalStyle($input, $output);
    
     $like = 'GRENOBLE';
    
//     $result = db_select('villes_field_data', 'v')
//              ->fields('v',array('name'))
//              ->condition('name', '%' . db_like($like) . '%', 'LIKE')
//              ->execute();
     
     $value = 'GREN' ; 
     $ids =    \Drupal::entityQuery('villes')
                ->condition('name', '%' . db_like($like) . '%', 'LIKE')
                ->execute() ; 
     
     
     
         $villes = \Drupal::entityTypeManager()->getStorage('villes')->loadMultiple($ids) ; 
    
         $matche = [] ;  
         foreach ($villes as $ville ) {
             $matche[] = array(
                 'label' => $ville->name->value , 
                 'value' => $ville->name->value
             ) ; 
         }

         print_r($matche) ; 
   
    $io->info($this->trans('commands.debuug.messages.success'));
  }
}
