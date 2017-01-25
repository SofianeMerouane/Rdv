<?php

/**
 * @file
 * Contains medecins.page.inc.
 *
 * Page callback for Medecins entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Medecins templates.
 *
 * Default template: medecins.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_medecins(array &$variables) {
  // Fetch medecins Entity Object.
  $medecins = $variables['elements']['#medecins'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
