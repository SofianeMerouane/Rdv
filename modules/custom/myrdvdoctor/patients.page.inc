<?php

/**
 * @file
 * Contains patients.page.inc.
 *
 * Page callback for Patients entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Patients templates.
 *
 * Default template: patients.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_patients(array &$variables) {
  // Fetch patients Entity Object.
  $patients = $variables['elements']['#patients'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
