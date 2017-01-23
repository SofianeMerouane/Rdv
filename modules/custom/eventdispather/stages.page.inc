<?php

/**
 * @file
 * Contains stages.page.inc.
 *
 * Page callback for Stages entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Stages templates.
 *
 * Default template: stages.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_stages(array &$variables) {
  // Fetch stages Entity Object.
  $stages = $variables['elements']['#stages'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
