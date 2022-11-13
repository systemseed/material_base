(function ($, Drupal) {
  'use strict';

  Drupal.behaviors.THEMENAME_MDCFunctions = {
    attach: function(context, settings) {

      // Using MDC auto init feature.
      // See https://material.io/develop/web/components/auto-init/
      window.mdc.autoInit();

    }
  };
}) (jQuery, Drupal);
