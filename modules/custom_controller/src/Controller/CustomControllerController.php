<?php

namespace Drupal\custom_controller\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Custom Controller routes.
 */
class CustomControllerController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
