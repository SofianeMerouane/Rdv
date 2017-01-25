<?php

namespace Drupal\myrdvdoctor\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Drupal\Console\Command\Shared\CommandTrait;
use Drupal\Console\Style\DrupalStyle;

/**
 * Class DiCommand.
 *
 * @package Drupal\myrdvdoctor
 */
class DiCommand extends Command {

  use CommandTrait;
  
  protected $logger  ; 

  public function __construct(\Drupal\Core\Logger\LoggerChannelFactory $logger, $name = null) {
      parent::__construct($name);
      $this->logger = $logger  ; 
      
  }

  
  /**
   * {@inheritdoc}
   */
  protected function configure() {
    $this
      ->setName('myrdvdoctor:default')
      ->setDescription($this->trans('commands.myrdvdoctor.default.description'));
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $io = new DrupalStyle($input, $output);
    
    $v = new Voiture("citroen") ; 
    echo serialize($v) ; 

    $io->info($this->trans('commands.myrdvdoctor.default.messages.success'));
  }
}


class  Voiture {
    private $name ; 
    public function __construct($name) {
        $this->name = $name ; 
    }
}