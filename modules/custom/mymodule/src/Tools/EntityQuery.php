<?php

namespace Drupal\mymodule\Tools;



 class EntityQuery extends \Symfony\Component\Console\Command\Command {
    
  use \Drupal\Console\Command\Shared\CommandTrait ;   
     
    protected $entityManager;
    protected $database;

    
    public function __construct(\Drupal\Core\Entity\EntityManager $entity_manager, \Drupal\Core\Database\Connection $databases) {
        parent::__construct();
        $this->entityManager = $entity_manager;
        $this->database = $databases;
    }
    
    public static function create ( \Symfony\Component\DependencyInjection\ContainerInterface $container){
        return new static( $container->get('entity.manager'), $container->get('database'));
    }
    
}