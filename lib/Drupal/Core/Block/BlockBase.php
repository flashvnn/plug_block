<?php

/**
 * @file
 * Contains \Drupal\Core\Block\BlockBase.
 */

namespace Drupal\Core\Block;

use Drupal\block\BlockInterface;
use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContextAwarePluginAssignmentTrait;
use Drupal\Core\Plugin\ContextAwarePluginBase;
use Drupal\Component\Utility\Unicode;
use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Component\Transliteration\TransliterationInterface;

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
   * @inheritDoc
   */
  public function label() {
    if (!empty($this->configuration['label'])) {
      return $this->configuration['label'];
    }
    $definition = $this->getPluginDefinition();
    return (string) $definition['admin_label'];
  }

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
   * @inheritDoc
   */
  public function build() {
    return array(
      '#markup' => '',
    );
  }
}
