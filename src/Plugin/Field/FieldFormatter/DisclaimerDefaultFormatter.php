<?php
/**
 * @file
 * Contains \Drupal\disclaimer\Plugin\field\formatter\SDisclaimerDefaultFormatter.
 */

namespace Drupal\disclaimer\Plugin\Field\FieldFormatter;


use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
// use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'disclaimer_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "disclaimer_formatter",
 *   label = @Translation("Disclaimer formatter"),
 *   field_types = {
 *     "disclaiemr_reference"
 *   }
 * )
 */
class DisclaimerDefaultFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      // dpm($item->get('target_id'));
      // Render output using disclaimer_formatter theme.
      // $source = array(
      //   '#theme' => 'disclaimer_formatter',
      //   '#disclaimer_node' => $item->disclaimer_node,
      // );
      // dpm($item);
      // $element = [];
      $element[$delta] = ['#markup' => $item->value];
    }

    return $element;
  }
}