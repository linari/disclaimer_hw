<?php
/**
 * @file
 * Contains \Drupal\disclaimer\Plugin\Field\FieldType\DisclaimerItem.
 */

namespace Drupal\disclaimer\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldItemBase;
// use Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem;

/**
 * Plugin implementation of the field type.
 *
 * @FieldType(
 *   id = "disclaimer_reference",
 *   label = @Translation("Disclaimer"),
 *   description = @Translation("Choose the Disclamer to show on this node page load"),
 *   default_widget = "disclaimer_widget",
 *   default_formatter = "disclaimer_formatter"
 * )
 */
class DisclaimerItem extends FieldItemBase {
  /**
   * {@inheritdoc}
   * 
   * defining the schema for the field
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'target_id' => [
          'description' => 'Disclaimer node id',
          'type' => 'int',
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties = [];
    //tried the 'entity_reference' type too - probably one of these two would work :)
    $properties['target_id'] = DataDefinition::create('integer')
      ->setLabel(t('Disclaimer node ID'))
      ->setDescription(t('The ID of the referenced Disclaimer node'));

    return $properties;
  }

   /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $value = $this->get('target_id')->getValue();
    return $value === NULL || $value === '';
  }
}