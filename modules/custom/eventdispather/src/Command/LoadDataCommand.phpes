<?php

namespace Drupal\eventdispather\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Drupal\Console\Command\Shared\CommandTrait;
use Drupal\Console\Style\DrupalStyle;

/**
 * Class LoadDataCommand.
 *
 * @package Drupal\eventdispather
 */
class LoadDataCommand extends Command {

  use CommandTrait;

  /**
   * {@inheritdoc}
   */
  protected function configure() {
      
      
     $test =  \Drupal::service('eventbaniere') ; 
   //  print_r($test) ; 
      
    $this
      ->setName('loadData')
      ->setDescription($this->trans('commands.loadData.description'));
  }

  /**
   * {@inheritdoc}
   */
  protected function execute(InputInterface $input, OutputInterface $output) {
    $io = new DrupalStyle($input, $output);

    $io->info($this->trans('commands.loadData.messages.success'));
  }
}
