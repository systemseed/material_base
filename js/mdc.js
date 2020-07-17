(function ($, Drupal) {
  'use strict';

  Drupal.behaviors.materialBaseMDC = {
    attach: function(context, settings) {

      // Using MDC auto init feature.
      // See https://material.io/develop/web/components/auto-init/
      window.mdc.autoInit();

      // Handling chips
      // Add class when checkbox checked by default.
      $(context).find('.form-item-chip input[type=checkbox]').each(function() {
        if ($(this).attr('checked')) {
          $(this).closest('.form-item').addClass('input-checked');
          // Replacing icon.
          var icon = $(this).closest('.mb-chip').find('.mb-chip__icon');
          icon.attr('data-icon', icon.text());
          icon.text('done');
        }
      });

      // Toggle class when checkbox checked/unchecked.
      $(context).find('.form-item-chip input[type=checkbox]').click(function() {
        var icon = $(this).closest('.mb-chip').find('.mb-chip__icon');
        if ($(this).prop('checked')) {
          $(this).closest('.form-item').addClass('input-checked');
          // Replacing icon.
          icon.attr('data-icon', icon.text());
          icon.text('done');
        } else {
          $(this).closest('.form-item').removeClass('input-checked');
          // Replacing icon.
          icon.text(icon.attr('data-icon'));
        }
      });

    }
  };
}) (jQuery, Drupal);
