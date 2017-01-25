<?php

namespace Drupal\myrdvdoctor\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'rdvBlock' block.
 *
 * @Block(
 *  id = "rdv_block",
 *  admin_label = @Translation("Rdv block"),
 * )
 */
class rdvBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
      $form = \Drupal::formBuilder()->getForm('Drupal\myrdvdoctor\Form\rdvDoctor');
  /*  $build = [];
    $build['default_block']['#markup'] = 'Implement DefaultBlock.';*/

    return $form;
  }

}
