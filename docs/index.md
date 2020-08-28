Material Base v2
================

Introduction
------------

Material Base v2 (MB) is a base theme for Drupal 8 and 9.

MB was completely rewritten since version 1.x and there is no upgrade path from v1 to v2.

MB implements [Material Design](https://material.io/) concept (2nd edition) by Google.

MB uses [Material Components for web](https://material.io/develop/web) library by Google.

MB uses a component-based approach and Drupal libraries for organizing theme elements and features.

MB designed for themers and developers and requires knowledge of Drupal theming system and Sass for effective use.

Happy theming!

Quick install
-------------

**Install theme**

The recommended way for getting the theme is installing it with Composer.

~~~
composer require 'drupal/material_base:^2.0'
~~~

For more information see this [page](https://www.drupal.org/docs/develop/using-composer/using-composer-to-install-drupal-and-manage-dependencies).

**Enable theme**

It is not recommended to using Material Base theme as a site theme, the best practice is creating subtheme and specify Material Base as a base theme. However base theme could be used for demonstration purposes.

Just enable it and make default via Appearance settings or Drush, as usual.

Full documentation
------------------

* Getting started
    * [Installing](/install.md)
    * [Setup](/setup.md)
    * [Building](/build.md)
* Theme achitecture
    * [Folder structure](/folder-structure.md)
    * [MDC subtheme](/mdc.md)
    * [Custom subtheme template](/subtheme-template.md)
    * [Variables](/variables.md)
* Theme features
    * [Using libraries](/libraries.md)
    * [Grid](/grid.md)
    * [Breakpoints](/breakpoints.md)
    * [Mixins](/mixins.md)
    * [Helpers and extends](/helpers-extends.md)
    * [Icon fonts](/icon-fonts.md)
    * [SVG icons sprite](/svg-icons.md)
* [Components](/components.md)
    * [Icon](/components/icon.md)
    * [Button](/components/button.md)
    * [Icon button](/components/icon-button.md)
    * [Card](/components/card.md)
    * [Form](/components/form.md)
    * [Search](/components/search.md)
    * [Text list](/components/text-list.md)
    * [Accordion](/components/accordion.md)
    * [Dropdown](/components/dropdown.md)
    * [Menu dropdown](/components/menu-dropdown.md)
    * [Tooltip](/components/tooltip.md)
    * [Chip](/components/chip.md)
    * [Copy target](/components/copy-target.md)
    * [Slick](/components/slick.md)
    * [Navbar](/components/navbar.md)
    * [Overlay](/components/overlay.md)
    * [Messages](/components/messages.md)
  
