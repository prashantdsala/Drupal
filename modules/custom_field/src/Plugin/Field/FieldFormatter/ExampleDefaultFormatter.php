<?php

namespace Drupal\custom_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Plugin implementation of the 'custom_field_example_default' formatter.
 *
 * @FieldFormatter(
 *   id = "custom_field_example_default",
 *   label = @Translation("Default"),
 *   field_types = {"custom_field_example"}
 * )
 */
class ExampleDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return ['foo' => 'bar'] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $settings = $this->getSettings();
    $element['foo'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Foo'),
      '#default_value' => $settings['foo'],
    ];
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $settings = $this->getSettings();
    $summary[] = $this->t('Foo: @foo', ['@foo' => $settings['foo']]);
    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {

      if ($item->value_1) {
        $element[$delta]['value_1'] = [
          '#type' => 'item',
          '#title' => $this->t('Value 1'),
          '#markup' => $item->value_1,
        ];
      }

      if ($item->value_2) {
        $element[$delta]['value_2'] = [
          '#type' => 'item',
          '#title' => $this->t('Value 2'),
          '#markup' => $item->value_2,
        ];
      }

      if ($item->value_3) {
        $element[$delta]['value_3'] = [
          '#type' => 'item',
          '#title' => $this->t('Value 3'),
          'content' => [
            '#type' => 'link',
            '#title' => $item->value_3,
            '#url' => Url::fromUri('mailto:' . $item->value_3),
          ],
        ];
      }

    }

    return $element;
  }

}
