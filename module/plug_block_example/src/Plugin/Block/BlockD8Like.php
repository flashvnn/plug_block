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
  /**
   * @inheritDoc
   */
  public function build() {
    return array(
      '#markup' => 'Block Like Drupal 8 Content',
    );
  }
}
