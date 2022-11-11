<?php

/**
 * Install material_stable9 theme.
 */
function material_base_post_update_9001() {
  \Drupal::service('theme_installer')->install(['material_stable9']);
}
