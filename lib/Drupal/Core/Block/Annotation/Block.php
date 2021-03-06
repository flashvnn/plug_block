<?php

namespace Drupal\Core\Block\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Block annotation object.
 *
 * @ingroup block_api
 *
 * @Annotation
 */
class Block extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The administrative label of the block.
   *
   * @var string
   */
  public $admin_label = '';

  /**
   * The category in the admin UI where the block will be listed.
   *
   * @var string
   *    The category.
   */
  public $category = '';

}
