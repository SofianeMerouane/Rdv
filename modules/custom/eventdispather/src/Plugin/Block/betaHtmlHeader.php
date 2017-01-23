<?php

namespace Drupal\eventdispather\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'betaHtmlHeader' block.
 *
 * @Block(
 *  id = "beta_html_header",
 *  admin_label = @Translation("Beta html header"),
 * )
 */
class betaHtmlHeader extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['beta_html_header']['#markup'] = 'zzzzz';

    return $build;
  }

}
