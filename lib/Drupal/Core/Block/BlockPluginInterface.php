<?php

/**
 * @file
 * Contains \Drupal\Core\Block\BlockPluginInterface.
 */

namespace Drupal\Core\Block;


/**
 * Defines the required interface for all block plugins.
 *
 * @todo Add detailed documentation here explaining the block system's
 *   architecture and the relationships between the various objects, including
 *   brief references to the important components that are not coupled to the
 *   interface.
 *
 * @ingroup block_api
 */
interface BlockPluginInterface {

  /**
   * Returns the user-facing block label.
   *
   * @todo Provide other specific label-related methods in
   *   https://www.drupal.org/node/2025649.
   *
   * @return string
   *   The block label.
   */
  public function label();


  /**
   * Builds and returns the renderable array for this block plugin.
   *
   * If a block should not be rendered because it has no content, then this
   * method must also ensure to return no content: it must then only return an
   * empty array, or an empty array with #cache set (with cacheability metadata
   * indicating the circumstances for it being empty).
   *
   * @return array
   *   A renderable array representing the content of the block.
   *
   * @see \Drupal\block\BlockViewBuilder
   */
  public function build();
  
}
