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

      // Handling MDC dropdown menu.
      $(context).find('.mdc-menu-dropdown .mdc-menu-dropdown__toggle').click(function(e) {
        e.preventDefault();

        var currentDropDown = $(this).closest('.mdc-menu-dropdown');
        var currentDropDownMenu = currentDropDown.find('.mdc-menu')[0].MDCMenu;
        var isExpanded = currentDropDown.hasClass('mdc-menu-dropdown--expanded');

        if (currentDropDown.closest('.mdc-menu-dropdown__group').length) {
          var otherDropDowns = currentDropDown.closest('.mdc-menu-dropdown__group').find('.mdc-menu-dropdown').not(currentDropDown);
        }

        if (isExpanded) {
        currentDropDown.removeClass('mdc-menu-dropdown--expanded');
        } else {
          currentDropDownMenu.open = true;
          currentDropDown.addClass('mdc-menu-dropdown--expanded');
          if (otherDropDowns) {
            otherDropDowns.removeClass('mdc-menu-dropdown--expanded');
          }
        }

      });

      $('body').click(function(e) {
        if (!e.target.closest('.mdc-menu-dropdown')) {
          $('.mdc-menu-dropdown').removeClass('mdc-menu-dropdown--expanded');
        }
      });

      $('.mdc-menu-dropdown .mdc-menu a').click(function() {
        $('.mdc-menu-dropdown').removeClass('mdc-menu-dropdown--expanded');
      });

      // Displaying status messages.
      $(context).find('.messages.mdc-snackbar').each(function() {
        $(this)[0].MDCSnackbar.open();
      });

    }
  };
}) (jQuery, Drupal);
