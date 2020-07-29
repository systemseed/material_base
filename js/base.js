// **************
// Theme building
// **************

// Helper function for handling assetts in Webpack
function requireAll(r) {
  r.keys().forEach(r);
}

// Handling images for SVG sprite in Webpack
requireAll(require.context('../icons/', true, /\.svg$/));

// Handling images for optimization in Webpack
requireAll(require.context('../images/', true, /\.(png|jpg|jpeg|webp|svg)$/));

// **************
// Theme fuctions
// **************

// Theme fuctions with support of jQuery
(function ($) {
  $(document).ready(function () {

    // Handling overlay visibility
    $('.overlay-open__button').click(function(e) {
      e.preventDefault();
      $('body').addClass('overlay-open');
    });

    $('.overlay-close__button').click(function(e) {
      e.preventDefault();
      $('body').removeClass('overlay-open');
    });

    $('.overlay-nav .menu-item a').click(function() {
      $('body').removeClass('overlay-open');
    });

    // Accordion
    $('.mb-accordion .mb-accordion__section-toggle').click(function(e) {
      e.preventDefault();

      var currentSection = $(this).closest('.mb-accordion__section');
      var otherSections = $(this).closest('.mb-accordion').find('.mb-accordion__section').not(currentSection);

      currentSection.find('.mb-accordion__section-panel').slideToggle('fast');
      currentSection.toggleClass('mb-accordion__section--expanded');

      otherSections.find('.mb-accordion__section-panel').slideUp('fast');
      otherSections.removeClass('mb-accordion__section--expanded');
    });

    // Dropdown
    $('.mb-dropdown .mb-dropdown__toggle').click(function(e) {
      e.preventDefault();
      var currentDropDown = $(this).closest('.mb-dropdown');
      var isExpanded = currentDropDown.hasClass('mb-dropdown--expanded');

      if (currentDropDown.closest('.mb-dropdown__group').length) {
        var otherDropDowns = currentDropDown.closest('.mb-dropdown__group').find('.mb-dropdown').not(currentDropDown);
      }

      if (isExpanded) {
        currentDropDown.find('.mb-dropdown__panel').slideUp('fast');
        currentDropDown.removeClass('mb-dropdown--expanded');
      } else {
        currentDropDown.find('.mb-dropdown__panel').slideDown('fast');
        currentDropDown.addClass('mb-dropdown--expanded');
        if (otherDropDowns) {
          otherDropDowns.find('.mb-dropdown__panel').slideUp('fast');
          otherDropDowns.removeClass('mb-dropdown--expanded');
        }
      }
    });

    $('body').click(function(e) {
      if (!e.target.closest('.mb-dropdown')) {
        $('.mb-dropdown').find('.mb-dropdown__panel').slideUp('fast');
        $('.mb-dropdown').removeClass('mb-dropdown--expanded');
      }
    });

    $('.mb-dropdown__panel a').click(function() {
      $('.mb-dropdown').find('.mb-dropdown__panel').slideUp('fast');
      $('.mb-dropdown').removeClass('mb-dropdown--expanded');
    });

    // Copy target text to clipboard
    var copyTarget = new ClipboardJS('.copy-target__button', {
      text: function(trigger) {
        return trigger.getAttribute('data-target');
      }
    });

    copyTarget.on('success', function(e) {
      $(e.trigger).closest('.copy-target').addClass('just-clicked');

      setTimeout(function() {
        $(e.trigger).closest('.copy-target').removeClass('just-clicked');
      }, 3000);

      e.clearSelection();
    });

  });
}(jQuery));

// Theme fuctions with support of Drupal settings, ajax loading and jQuery
(function ($, Drupal, drupalSettings) {
  'use strict';

  Drupal.behaviors.materialBaseFunctions = {
    attach: function(context, settings) {

      // Handling clear button for text fields.
      $(context).find('.input-clear').click(function() {
        var input = $(this).closest('.form-item').find('input');
        input.val('');
        input.focus();
      });

      // Handling search stuff.
      $(context).find('.search-toggle__button').click(function() {
        $('body').toggleClass('search-open');
        if ($('body').hasClass('search-open')) {
          var fieldInput = $('.search-field input').first();
          var fldLength= fieldInput.val().length;
          fieldInput.focus();
          fieldInput[0].setSelectionRange(fldLength, fldLength);
        }
      });

      $(context).find('.search-open__button').click(function() {
        $('body').addClass('search-open');
        var fieldInput = $('.search-field input').first();
        var fldLength= fieldInput.val().length;
        fieldInput.focus();
        fieldInput[0].setSelectionRange(fldLength, fldLength);
      });

      $(context).find('.search-close__button').click(function() {
        $('body').removeClass('search-open');
      });

      $(context).find('.search-field input.form-autocomplete').on('autocompleteopen', function() {
        $('body').addClass('search-autocomplete-open');
      });
      
      $(context).find('.search-field input.form-autocomplete').on('autocompleteclose', function() {
        $('body').removeClass('search-autocomplete-open');
      });

      // Status messages close button.
      $(context).find('.messages .messages__close-button').click(function() {
        $(this).closest('.messages').fadeOut('fast');
      });

      // Fixed status messages auto hide.
      setTimeout(function() {
        $(context).find('.messages--fixed').fadeOut('fast');
      }, 5000);

    }
  };
}) (jQuery, Drupal, drupalSettings);
