Variables
=========

Material Base provides Sass variables for site level customizations and options.

List of variables and their default values:

~~~
// Colors

$color-primary-base: #546e7a;
$color-secondary-base: #00c9f8;
$color-accent-base: $color-secondary-base;
$color-bg-body: #FFF;

$theme-primary: $color-primary-base;
$theme-secondary: $color-secondary-base;
$theme-background: $color-bg-body;

$color-text-base: #000;
$color-text: rgba($color-text-base, .87);
$color-heading: darken($theme-primary, 20);

$color-text-light-base: #FFF;
$color-text-light: $color-text-light-base;

$color-on-primary: $color-text-light;
$color-on-secondary: $color-text-light;

$color-text-placeholer: rgba($color-text-base, .6);

// Fonts & typography

$font-family-base: 'Roboto', sans-serif;
$font-family-additional: $font-family-base;

$font-family-text: $font-family-base;
$font-family-heading: $font-family-additional;

$font-size-base: 16px;
$line-height-base: 1.5;

$font-size-h1: 6rem;
$line-height-h1: 6rem;
$font-weight-h1: 300;

$font-size-h2: 3.75rem;
$line-height-h2: 3.75rem;
$font-weight-h2: 300;

$font-size-h3: 3rem;
$line-height-h3: 3.125rem;
$font-weight-h3: 400;

$font-size-h4: 2.125rem;
$line-height-h4: 2.5rem;
$font-weight-h4: 400;

$font-size-h5: 1.5rem;
$line-height-h5: 2rem;
$font-weight-h5: 400;

$font-size-h6: 1.25rem;
$line-height-h6: 2rem;
$font-weight-h6: 500;

$font-size-st1: 1rem;
$line-height-st1: 1.75rem;
$font-weight-st1: 400;

$font-size-st2: .875rem;
$line-height-st2: 1.375rem;
$font-weight-st2: 500;
 
// body 
$font-size-text: 1rem;
$line-height-text: 1.5rem;
$font-weight-text: 400;

$font-size-text-small: .875rem;
$line-height-text-small: 1.25rem;
$font-weight-text-small: 400;

$font-size-caption: .75rem;
$line-height-caption: 1.25rem;
$font-weight-caption: 400;

$font-size-button: .875rem;
$line-height-button: 2.25rem;
$font-weight-button: 500;

$font-size-overline: .75rem;
$line-height-overline: 2rem;
$font-weight-overline: 500;
~~~

Main colors and typography variables reflects [MDC library](/mdc.md) variables structure. 

Layouts and styles of Material Base theme components are built depending on variables values. 

Adjusting variables
-------------------

Variables cover most of the coloring, default sizing, and typography definitions, so adjusting their values in your custom theme would be a good starting point for theme development.

Variables could be changed or added in your custom theme `variables.scss` file. Material Base theme components in your custom theme will be built depending on adjusted values.
