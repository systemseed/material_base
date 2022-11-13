Material Base v2
================

Introduction
------------

Material Base — is a base theme for Drupal 7, 8, 9 and 10.
It implements [Material Design](https://material.io/) concept by Google.

The theme was made as basic styles and a set of components, which can be easily combined for making beautiful Drupal themes instead of building them from scratch. It utilises [Material Components for web](https://m2.material.io/develop/web) library by Google.

Material Base v2 has been completely rewritten since version 1.x and there is no upgrade path from v1 to v2.

Material Base — is the theme for themers. It requires knowledge of Drupal theming system and CSS/SASS.

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

It is not recommended to use Material Base theme as a site theme, the best practice is to create a subtheme and specify Material Base as a base theme. However, base theme could be used for demonstration purposes.

Just enable it and make it default via Appearance settings or Drush, as usual.

Upgrate from v2 beta to stable version
--------------------------------------

In v2 beta versions, Material Base used "Stable" as a base theme but in 2.0 it was changed to "Stable 9". The copy of "Stable 9" from Drupal Core 9.4.8 was added to Material Base as "Material Stable 9". Following the new approach of subtheming, we are using our own copy of the base theme instead of referring to it.

Full documentation
------------------

* **Getting started**
    * [Installing](install.md)
    * [Setup](setup.md)
    * [Building](build.md)
* **Theme architecture**
    * [Folder structure](folder-structure.md)
    * [MDC subtheme](mdc.md)
    * [Custom subtheme template](subtheme-template.md)
    * [Variables](variables.md)
* **Theme features**
    * [Using libraries](libraries.md)
    * [Grid](grid.md)
    * [Breakpoints](breakpoints.md)
    * [Mixins](mixins.md)
    * [Helpers and extends](helpers-extends.md)
    * [Icon fonts](icon-fonts.md)
    * [SVG icons sprite](svg-icons.md)
* **[Components](components.md)**
    * [Icon](components/icon.md)
    * [Button](components/button.md)
    * [Icon button](components/icon-button.md)
    * [Card](components/card.md)
    * [Form](components/form.md)
    * [Search](components/search.md)
    * [Text list](components/text-list.md)
    * [Accordion](components/accordion.md)
    * [Dropdown](components/dropdown.md)
    * [Menu dropdown](components/menu-dropdown.md)
    * [Tooltip](components/tooltip.md)
    * [Chip](components/chip.md)
    * [Copy target](components/copy-target.md)
    * [Slick](components/slick.md)
    * [Navbar](components/navbar.md)
    * [Overlay](components/overlay.md)
    * [Messages](components/messages.md)
