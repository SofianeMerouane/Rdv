<?php

namespace Drupal\eventdispather\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'BetaHtml' block.
 *
 * @Block(
 *  id = "beta_html",
 *  admin_label = @Translation("Beta html"),
 * )
 */
class BetaHtml extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['beta_html']['#markup'] = 'zzzzz';
    // $message = \Drupal::menuTree()->;
    return $build;
  }

}
