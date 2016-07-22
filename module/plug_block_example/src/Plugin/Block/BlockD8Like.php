<?php
namespace Drupal\plug_block_example\Plugin\Block;
use Drupal\Core\Block\Annotation\Block;
use Drupal\Core\Block\BlockBase;

/**
 * @file
 * Contain of Block1.php
 */

/**
 * Provides a 'Block1' block.
 *
 * @Block(
 *   id = "plug_block_blockd8like",
 *   admin_label = "Block Like Drupal 8",
 *   subject = "BlockD8"
 * )
 */
class BlockD8Like extends BlockBase {

  /** @inheritdoc */
  public function blockForm($form, $form_state) {
    $form['demo'] = array(
      '#type'          => 'textfield',
      '#required'      => TRUE,
      '#title'         => t('DEMO'),
      '#description'   => t('Input demo value with length > 2'),
      '#default_value' => variable_get('plug_block_blockd8like_demo'),
    );

    return $form;
  }

  /** @inheritdoc */
  public function blockValidate($form, $form_state) {
    if (strlen($form_state['values']['demo']) < 2) {
      form_set_error('demo', t('Please input a value with length >2'));
    }
  }

  /** @inheritdoc */
  public function blockSubmit($form, $form_state) {
    variable_set('plug_block_blockd8like_demo', $form_state['values']['demo']);
    drupal_set_message('Your configuration is saved.');
  }

  /**
   * @inheritDoc
   */
  public function build() {
    return array(
      '#markup' => 'Block Like Drupal 8 Content',
    );
  }
}
