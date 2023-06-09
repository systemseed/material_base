<?php

/**
 * @file
 * Update functions for material_base theme.
 */

/**
 * Install material_stable9 theme.
 */
function material_base_post_update_9001() {
  \Drupal::service('theme_installer')->install(['material_stable9']);
}

/**
 * Install stable9 and uninstall material_stable9 themes.
 */
function material_base_post_update_9002() {
  $theme_installer = \Drupal::service('theme_installer');
  $theme_installer->install(['stable9']);
  $theme_installer->uninstall(['material_stable9']);
}
