<?php

namespace Drupal\Core\Block;

use Drupal\Component\Plugin\PluginBase;

/**
 * Defines a base block implementation that most blocks plugins will extend.
 *
 * This abstract class provides the generic block configuration form, default
 * block settings, and handling for general user-defined block visibility
 * settings.
 *
 * @ingroup block_api
 */
abstract class BlockBase extends PluginBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function label() {
    if (!empty($this->configuration['label'])) {
      return $this->configuration['label'];
    }
    $definition = $this->getPluginDefinition();
    return (string) $definition['admin_label'];
  }

  /**
   * Get subject of Block.
   *
   * @return string
   *    Block subject.
   */
  public function subject() {
    $definition = $this->getPluginDefinition();
    return !empty($definition['subject']) ? $definition['subject'] : "";
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, $form_state) {
    return array();
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#markup' => '',
    );
  }

}
