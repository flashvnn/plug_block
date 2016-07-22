<?php

namespace Drupal\plug_block\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Class BlockTemplateBase.
 *
 * @package Drupal\plug_block\Block
 */
class BlockTemplateBase extends BlockBase {
  public $variables = [];
  public $templatePath;
  public $build     = array();

  /**
   * Prepare for variables and template path.
   *
   * It must implemented in sub class.
   *
   * @param string $file
   *    The file path where to check template file.
   */
  public function prepare($file = __FILE__) {
    $dir        = dirname($file);
    $definition = $this->getPluginDefinition();
    if (isset($definition['template'])) {
      $this->templatePath = $dir . "/templates/" . $definition['template'];
    }
    if (isset($definition['theme_hook_suggestions'])) {
      $this->build['#theme_hook_suggestions'] = $definition['theme_hook_suggestions'];
    }
  }

  /**
   * Check string end with $needle.
   *
   * @param string $haystack
   *   The input string.
   * @param string $needle
   *   The string check end with.
   *
   * @return bool
   *   Return true if string end with needle.
   */
  public function endsWith($haystack, $needle) {
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $this->prepare();
    if (!$this->endsWith($this->templatePath, '.tpl.php')) {
      $this->templatePath = $this->templatePath . '.tpl.php';
    }
    if (file_exists($this->templatePath)) {
      $this->templatePath     = str_replace(DRUPAL_ROOT . "/", '', $this->templatePath);
      $this->build['#markup'] = theme_render_template($this->templatePath, $this->variables);
      return $this->build;
    }

    return FALSE;
  }

}
