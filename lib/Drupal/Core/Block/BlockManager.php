<?php

namespace Drupal\Core\Block;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\plug_block\Util\Module;

/**
 * Class BlockManager.
 *
 * @package Drupal\Core\Block
 */
class BlockManager extends DefaultPluginManager {

  /**
   * Constructs BlockPluginManager.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \DrupalCacheInterface $cache_backend
   *   Cache backend instance to use.
   */
  public function __construct(\Traversable $namespaces, \DrupalCacheInterface $cache_backend) {
    parent::__construct('Plugin/Block', $namespaces, 'Drupal\Core\Block\BlockPluginInterface', 'Drupal\Core\Block\Annotation\Block');
    $this->setCacheBackend($cache_backend, 'block_plugins');
    $this->alterInfo('block');
  }

  /**
   * BlockPluginManager factory method.
   *
   * @param string $bin
   *   The cache bin for the plugin manager.
   *
   * @return BlockManager
   *   The created manager.
   */
  public static function create($bin = 'cache') {
    return new static(Module::getNamespaces(), _cache_get_object($bin));
  }

}
