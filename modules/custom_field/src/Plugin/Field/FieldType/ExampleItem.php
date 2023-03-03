<?php

namespace Drupal\custom_field\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Email;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Defines the 'custom_field_example' field type.
 *
 * @FieldType(
 *   id = "custom_field_example",
 *   label = @Translation("Example"),
 *   category = @Translation("General"),
 *   default_widget = "custom_field_example",
 *   default_formatter = "custom_field_example_default"
 * )
 */
class ExampleItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings() {
    $settings = ['foo' => 'example'];
    return $settings + parent::defaultStorageSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function storageSettingsForm(array &$form, FormStateInterface $form_state, $has_data) {
    $settings = $this->getSettings();

    $element['foo'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Foo'),
      '#default_value' => $settings['foo'],
      '#disabled' => $has_data,
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    $settings = ['bar' => 'example'];
    return $settings + parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $settings = $this->getSettings();

    $element['bar'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Foo'),
      '#default_value' => $settings['bar'],
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    if ($this->value_1 !== NULL) {
      return FALSE;
    }
    elseif ($this->value_2 !== NULL) {
      return FALSE;
    }
    elseif ($this->value_3 !== NULL) {
      return FALSE;
    }
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {

    $properties['value_1'] = DataDefinition::create('integer')
      ->setLabel(t('Value 1'));
    $properties['value_2'] = DataDefinition::create('string')
      ->setLabel(t('Value 2'));
    $properties['value_3'] = DataDefinition::create('email')
      ->setLabel(t('Value 3'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function getConstraints() {
    $constraints = parent::getConstraints();

    // @todo Add more constraints here.
    return $constraints;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {

    $columns = [
      'value_1' => [
        'type' => 'int',
        'size' => 'normal',
      ],
      'value_2' => [
        'type' => 'varchar',
        'length' => 255,
      ],
      'value_3' => [
        'type' => 'varchar',
        'length' => Email::EMAIL_MAX_LENGTH,
      ],
    ];

    $schema = [
      'columns' => $columns,
      // @DCG Add indexes here if necessary.
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition) {

    $random = new Random();

    $values['value_1'] = mt_rand(-1000, 1000);

    $values['value_2'] = $random->word(mt_rand(1, 255));

    $values['value_3'] = strtolower($random->name()) . '@example.com';

    return $values;
  }

}
