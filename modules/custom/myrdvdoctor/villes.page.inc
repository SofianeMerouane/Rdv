<?php

/**
 * @file
 * Contains villes.page.inc.
 *
 * Page callback for Villes entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Villes templates.
 *
 * Default template: villes.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_villes(array &$variables) {
  // Fetch villes Entity Object.
  $villes = $variables['elements']['#villes'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
