Material Base v2
================

Introduction
------------

Material Base v2 (MB2) is a base theme for Drupal 8 and 9.

MB2 was completely rewritten since version 1.x and there is no upgrade path from v1 to v2.

MB2 implements [Material Design](https://material.io/) concept (2nd edition) by Google.

MB2 uses [Material Components for web](https://material.io/develop/web) library by Google.

MB2 uses a component-based approach and Drupal libraries for organizing theme elements and features.

MB2 designed for themers and developers and requires knowledge of Drupal theming system and Sass for effective use.

Happy theming!

Quick install
-------------

**Install theme**

The recommended way for getting the theme is installing it with Composer.

~~~
composer require 'drupal/material_base:2.x-dev'
~~~

For more information see this [page](https://www.drupal.org/docs/develop/using-composer/using-composer-to-install-drupal-and-manage-dependencies).

**Enable theme**

It is not recommended to using Material Base theme as a site theme, the best practice is creating subtheme and specify Material Base as a base theme. However base theme could be used for demonstration purposes.

Just enable it and make default via Appearance settings or Drush, as usual.

<!-- TODO: update and add additional steps if they will be needed -->

Full documentation
------------------

* Getting started
  * Installing
  * Setup
  * Building
* Theme achitecture
  * Folder structure
  * MDC subtheme
  * Custom subtheme template
  * Variables
* Theme features
  * Using libraries
  * [Grid](grid.md)
  * Breakpoints
  * [Mixins](mixins.md)
  * Fonts
  * Icon fonts
  * SVG icons sprite
* Components
  * Button
  * Icons
  * Card
