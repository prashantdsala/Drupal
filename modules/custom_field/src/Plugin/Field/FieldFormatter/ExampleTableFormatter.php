<?php

namespace Drupal\custom_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'custom_field_example_table' formatter.
 *
 * @FieldFormatter(
 *   id = "custom_field_example_table",
 *   label = @Translation("Table"),
 *   field_types = {"custom_field_example"}
 * )
 */
class ExampleTableFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $header[] = '#';
    $header[] = $this->t('Value 1');
    $header[] = $this->t('Value 2');
    $header[] = $this->t('Value 3');

    $table = [
      '#type' => 'table',
      '#header' => $header,
    ];

    foreach ($items as $delta => $item) {
      $row = [];

      $row[]['#markup'] = $delta + 1;

      $row[]['#markup'] = $item->value_1;

      $row[]['#markup'] = $item->value_2;

      $row[]['#markup'] = $item->value_3;

      $table[$delta] = $row;
    }

    return [$table];
  }

}
