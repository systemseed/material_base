Libraries
=========

Material Base uses Drupal libraries features for organizing CSS and JS assets.

It allows to exclude some parts of base theme you don't needed on your project.
It also allows to override existing parts or add additional parts to your subtheme when needed.

For more information about managing libraries see this [page](https://www.drupal.org/docs/theming-drupal/adding-stylesheets-css-and-javascript-js-to-a-drupal-theme#override-extend).

Default Material Base libraries
-------------------------------

All libraries from base theme includes by default to their subthemes untill you exclude them.

**Base**

Contains basic CSS, JS, variables and mixins which seems to be common for most of the projects.

This library not intended to be excluded because most other libraries depends on it.

More information about using [mixins](mixins.md) and [variables](variables.md).

**Grid**

Contains grid system definitions for [Flexbox Grid](http://flexboxgrid.com/) external library.

This library could be freely excluded or overridden by any other grid system.

More information about using Flexbox Grid in Material Base [here](grid.md).

**Fonts**

Contains default font definition. Default Material Design font family is Roboto, and it is included in MB.

This library intended to be excluded or overridden according to fonts used on your project.

**Icon font**

Contains "Material Icons" iconic fonts definition including themes like Outlined, Rounded, Sharp, Two-Tone and Filed (default).

This library could be excluded if you not going to use iconic fonts. It also could be overridden or extended by other iconic fonts.

More information about using Material Icons fonts in Material Base [here](icon-fonts.md).

Using iconic font is probably easiest way of using predefined icon sets like Material Icons or Font Awesome but not so convenient for custom icons. For easy using of custom icons (but not excluding icons from icon libraries) there is also SVG icon sprite generation function included in [building](build.md) process.

More information about using SVG icons sprite in Material Base [here](svg-icons.md).

Both icon usage options could be effectively used together.

**MDC** (library of "Material Base MDC" subtheme)

Contains [Material Components for web](https://material.io/develop/web) library definition.

This library was picked out to separate subtheme because it should be used together Twig templates specific to MDC library.

This library intended to be overridden by implementation in your custom subtheme crated with only MDC components directly used on your project and it's variables values.

More information about MDC in Material Base [here](mdc.md).

**Theme** (example library from `material_base_subtheme` folder)

Contains scaffolding for main library of your custom theme.

This library (or its replacement) intended to be used as the scope of your custom CSS, JS and templates specific to your project.

