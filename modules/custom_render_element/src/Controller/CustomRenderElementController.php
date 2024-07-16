<?php

namespace Drupal\custom_render_element\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Custom Render Element routes.
 */
class CustomRenderElementController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    // Returning our custom render element names "entity" with #type.
    return [
      '#type' => 'entity',
      '#entity_type' => 'node',
      '#entity_id' => 1, // change this id to your setup's entity id.
      '#view_mode' => 'teaser',
      '#langcode' => 'en',
    ];
  }

}
