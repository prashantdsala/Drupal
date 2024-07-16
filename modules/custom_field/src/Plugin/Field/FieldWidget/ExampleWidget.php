<?php

namespace Drupal\custom_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;

/**
 * Defines the 'custom_field_example' field widget.
 *
 * @FieldWidget(
 *   id = "custom_field_example",
 *   label = @Translation("Example"),
 *   field_types = {"custom_field_example"},
 * )
 */
class ExampleWidget extends WidgetBase {

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
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $element['value_1'] = [
      '#type' => 'number',
      '#title' => $this->t('Value 1'),
      '#default_value' => isset($items[$delta]->value_1) ? $items[$delta]->value_1 : NULL,
    ];

    $element['value_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Value 2'),
      '#default_value' => isset($items[$delta]->value_2) ? $items[$delta]->value_2 : NULL,
      '#size' => 20,
    ];

    $element['value_3'] = [
      '#type' => 'email',
      '#title' => $this->t('Value 3'),
      '#default_value' => isset($items[$delta]->value_3) ? $items[$delta]->value_3 : NULL,
      '#size' => 20,
    ];

    $element['#theme_wrappers'] = ['container', 'form_element'];
    $element['#attributes']['class'][] = 'container-inline';
    $element['#attributes']['class'][] = 'custom-field-example-elements';
    $element['#attached']['library'][] = 'custom_field/custom_field_example';

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function errorElement(array $element, ConstraintViolationInterface $violation, array $form, FormStateInterface $form_state) {
    return isset($violation->arrayPropertyPath[0]) ? $element[$violation->arrayPropertyPath[0]] : $element;
  }

  /**
   * {@inheritdoc}
   */
  public function massageFormValues(array $values, array $form, FormStateInterface $form_state) {
    foreach ($values as $delta => $value) {
      if ($value['value_1'] === '') {
        $values[$delta]['value_1'] = NULL;
      }
      if ($value['value_2'] === '') {
        $values[$delta]['value_2'] = NULL;
      }
      if ($value['value_3'] === '') {
        $values[$delta]['value_3'] = NULL;
      }
    }
    return $values;
  }

}
