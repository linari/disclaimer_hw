<?php
/**
 * @file
 * Contains \Drupal\disclaimer\Plugin\Field\FieldWidget\DisclaimerDefaultWidget.
 */

namespace Drupal\disclaimer\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/**
 * Plugin implementation of the 'disclaimer_widget' widget.
 *
 * @FieldWidget(
 *   id = "disclaimer_widget",
 *   label = @Translation("Disclaimer widget"),
 *   field_types = {
 *     "disclaimer_reference"
 *   }
 * )
 */
class DisclaimerDefaultWidget extends WidgetBase {
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $value = isset($items[$delta]->target_id) ? $items[$delta]->target_id : NULL;
// dpm($items[$delta]->value);
    $element += [
          '#type' => 'entity_autocomplete',
          '#title' => t('Select Disclaimer'),
          '#target_type' => 'node',
          '#selection_settings' => ['target_bundles' => ['disclaimer_popup']],
          '#tags' => TRUE,
          '#maxlength' => 1024,
          '#default_value' => $value,
          '#cardinality' => 1
    ];

    return ['target_id' => $element];
  }

  /**
   * Validate the entity reference field.
   */
  // public static function validate($element, FormStateInterface $form_state) {
  //   $value = $element['#value'];
  //   if (strlen($value) == 0) {
  //     $form_state->setValueForElement($element, '');
  //     return;
  //   }
  // }

}