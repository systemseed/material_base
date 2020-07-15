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

    // Placeholder

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

    }
  };
}) (jQuery, Drupal, drupalSettings);
