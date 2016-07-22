<?php

namespace Drupal\plug_block\Util;

use Drupal\plug\Util\Module as PlugModule;

/**
 * Custom Util Module.
 */
class Module extends PlugModule {

  /**
   * Gets the array of available namespaces for plugins.
   *
   * @param bool $all
   *   Include values for disabled modules.
   *
   * @return array
   *   The generated array of namespaces.
   */
  protected static function namespaces($all = FALSE) {
    $namespaces = array();
    foreach (static::getDirectories($all) as $module => $path) {
      $namespaces['Drupal\\' . $module] = $path . '/src';
    }
    $plugins_dir = DRUPAL_ROOT . '/sites/all/plugins/';
    $dirs        = array_filter(glob($plugins_dir . '*'), 'is_dir');
    foreach ($dirs as $dir) {
      $namespace              = str_replace($plugins_dir, '', $dir);
      $namespaces[$namespace] = $dir;
    }
    return $namespaces;
  }

}
