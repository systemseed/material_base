<?php

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function material_base_form_system_theme_settings_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  $form['layout'] = array(
    '#type' => 'details',
    '#title' => t('Layout'),
    '#open' => TRUE,
  );

  $form['layout']['navbar_fixed'] = array(
    '#type' => 'checkbox',
    '#title' => t('Sticky navbar'),
    '#default_value' => theme_get_setting('navbar_fixed'),
  );

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

  $form['layout']['footer_style'] = [
    '#type' => 'select',
    '#title' => t('Footer style'),
    '#options' => [
      'standard' => t('Standard'),
      'roomy' => t('Roomy'),
    ],
    '#default_value' => theme_get_setting('footer_style'),
  ];

  $form['layout']['messages_fixed'] = array(
    '#type' => 'checkbox',
    '#title' => t('Messages in overlay'),
    '#default_value' => theme_get_setting('messages_fixed'),
  );
}
