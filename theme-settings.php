<?php

/**
 * @file
 * Settings for material_base theme.
 */

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function material_base_form_system_theme_settings_alter(&$form, FormStateInterface $form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  $form['layout'] = [
    '#type' => 'details',
    '#title' => t('Layout'),
    '#open' => TRUE,
  ];

  $form['layout']['navbar_fixed'] = [
    '#type' => 'checkbox',
    '#title' => t('Sticky navbar'),
    '#default_value' => theme_get_setting('navbar_fixed'),
  ];

  $form['layout']['navbar_style'] = [
    '#type' => 'select',
    '#title' => t('Navbar style'),
    '#options' => [
      'standard' => t('Standard'),
      'dense' => t('Dense'),
      'prominent' => t('Prominent'),
    ],
    '#default_value' => theme_get_setting('navbar_style'),
  ];

  $form['layout']['drawer_style'] = [
    '#type' => 'select',
    '#title' => t('Drawer style'),
    '#options' => [
      'permanent' => t('Permanent'),
      'dismissible' => t('Dismissible'),
      'modal' => t('Modal'),
    ],
    '#default_value' => theme_get_setting('drawer_style'),
  ];

  $form['layout']['drawer_height'] = [
    '#type' => 'select',
    '#title' => t('Drawer height'),
    '#options' => [
      'full' => t('Full height'),
      'below_navbar' => t('Below navbar'),
    ],
    '#default_value' => theme_get_setting('drawer_height'),
  ];

  $form['layout']['footer_style'] = [
    '#type' => 'select',
    '#title' => t('Footer style'),
    '#options' => [
      'standard' => t('Standard'),
      'roomy' => t('Roomy'),
    ],
    '#default_value' => theme_get_setting('footer_style'),
  ];

  $form['layout']['messages_fixed'] = [
    '#type' => 'checkbox',
    '#title' => t('Messages in overlay'),
    '#default_value' => theme_get_setting('messages_fixed'),
  ];
}
