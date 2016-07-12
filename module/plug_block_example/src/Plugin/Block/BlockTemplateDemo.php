<?php

/**
 * @file
 * Contain of BlockTemplateDemo.php
 */

namespace Drupal\plug_block_example\Plugin\Block;


use Drupal\Core\Block\Annotation\Block;
use Drupal\plug_block\Block\BlockTemplateBase;

/**
 * Block with template demo
 * @Block(
 *  id = "plug_block_template_demo",
 *  admin_label = "Block with Template",
 *  subject = "Block & Template",
 *  template = "plug_block_template_demo"
 * )
 */
class BlockTemplateDemo extends BlockTemplateBase {
  /**
   * Must implement this prepare function.
   * This function help you can prepair variables of change template.
   */
  public function prepare($file = __FILE__) {
    parent::prepare($file);
    $this->variables = array("name" => "HUYNH KHAC THAO");
  }

}
