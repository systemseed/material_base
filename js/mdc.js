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

      // Handling navbar 2nd level menu.
      $(context).find('.navbar-menu--dropdown .menu--level-0 > .menu-item--expanded > .navbar-menu__item').click(function(e) {
        e.preventDefault();
        var currentDropDown = $(this).closest('.menu-item--expanded');
        var currentDropDownMenu = currentDropDown.find('.mdc-menu')[0].MDCMenu;
        var isExpanded = currentDropDownMenu.open;
        var otherDropDowns = currentDropDown.closest('.menu--level-0').find('.menu-item--expanded').not(currentDropDown);

        if (isExpanded) {
        currentDropDown.removeClass('menu-item--dropdown-expanded');
        } else {
          currentDropDown.addClass('menu-item--dropdown-expanded');
          if (otherDropDowns) {
            otherDropDowns.removeClass('menu-item--dropdown-expanded');
          }
        }

        currentDropDownMenu.open = !currentDropDownMenu.open;
      });

      $('body').click(function(e) {
        if (!e.target.closest('.navbar-menu--dropdown .menu--level-0 > .menu-item--expanded')) {
          $('.navbar-menu--dropdown .menu--level-0 > .menu-item--expanded').removeClass('menu-item--dropdown-expanded');
        }
      });

      $('.navbar-menu--dropdown .menu--level-0 > .menu-item--expanded .mdc-menu a').click(function() {
        $('.navbar-menu--dropdown .menu--level-0 > .menu-item--expanded').removeClass('menu-item--dropdown-expanded');
      });

    }
  };
}) (jQuery, Drupal);
