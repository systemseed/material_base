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

    // Place your code here

  });
}(jQuery));

// Theme fuctions with support of Drupal settings, ajax loading and jQuery
(function ($, Drupal, drupalSettings) {
  'use strict';

  Drupal.behaviors.THEMENAME_Functions = {
    attach: function(context, settings) {

      // Place your code here

    }
  };
}) (jQuery, Drupal, drupalSettings);
