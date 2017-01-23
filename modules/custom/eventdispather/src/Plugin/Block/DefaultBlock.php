<?php

namespace Drupal\eventdispather\Plugin\Block;

use Drupal\Core\Block\BlockBase;


/**
 * Provides a 'DefaultBlock' block.
 *
 * @Block(
 *  id = "default_block",
 *  admin_label = @Translation("Default block"),
 * )
 */
class DefaultBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
      
      
     $form = \Drupal::formBuilder()->getForm('Drupal\eventdispather\Form\DefaultForm');
  /*  $build = [];
    $build['default_block']['#markup'] = 'Implement DefaultBlock.';*/

    return $form;
  }

}
