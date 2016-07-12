<?php
namespace Drupal\plug_block\Block;
use Drupal\Core\Block\BlockBase;

/**
 * @file
 * Contain of BlockTemplateBase.php
 */
class BlockTemplateBase extends BlockBase {
  public $variables = [];
  public $template_path;
  public $build = array();
  /**
   * Prepare for variables and template path.
   * It must implemented in sub class.
   *
   * @throws \Exception
   */
  public function prepare($file = __FILE__) {
    $dir        = dirname($file);
    $definition = $this->getPluginDefinition();
    if (isset($definition['template'])) {
      $this->template_path = $dir . "/templates/" . $definition['template'];
    }
    if (isset($definition['theme_hook_suggestions'])) {
      $this->build['#theme_hook_suggestions'] = $definition['theme_hook_suggestions'];
    }
  }

  public function endsWith($haystack, $needle) {
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
  }

  /**
   * @inheritDoc
   */
  public function build() {
    $this->prepare();
    if (!$this->endsWith($this->template_path, '.tpl.php')) {
      $this->template_path = $this->template_path . '.tpl.php';
    }
    if (file_exists($this->template_path)) {
      $this->template_path = str_replace(DRUPAL_ROOT . "/", '', $this->template_path);
      $this->build['#markup'] = theme_render_template($this->template_path, $this->variables);
      return $this->build;
    }

    return FALSE;
  }
}
