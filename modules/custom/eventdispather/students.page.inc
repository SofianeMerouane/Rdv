<?php

/**
 * @file
 * Contains students.page.inc.
 *
 * Page callback for Students entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Students templates.
 *
 * Default template: students.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_students(array &$variables) {
  // Fetch students Entity Object.
  $students = $variables['elements']['#students'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
