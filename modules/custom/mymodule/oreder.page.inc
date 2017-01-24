<?php

/**
 * @file
 * Contains oreder.page.inc.
 *
 * Page callback for Oreder entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Oreder templates.
 *
 * Default template: oreder.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_oreder(array &$variables) {
  // Fetch oreder Entity Object.
  $oreder = $variables['elements']['#oreder'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
