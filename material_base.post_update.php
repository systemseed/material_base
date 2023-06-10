<?php

/**
 * @file
 * Update functions for material_base theme.
 */

/**
 * Install stable9 and uninstall material_stable9 themes.
 */
function material_base_post_update_9301() {
  $theme_installer = \Drupal::service('theme_installer');
  $theme_installer->install(['stable9']);
  if (\Drupal::service('theme_handler')->themeExists('material_stable9')) {
    $theme_installer->uninstall(['material_stable9']);
  }
}
