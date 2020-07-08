Setup
=====

Creating subtheme
-----------------

Material Base is a "base" theme which means it is not intended for direct usage. In most cases, you will need to create "subtheme" and specify Material Base as a "base" theme.
It will allow you to keep MB updated and avoid manually updating your custom theme.

For more information info about subtheming see this [page](https://www.drupal.org/docs/theming-drupal/creating-sub-themes).

Folder `material_base_subtheme` contains the template for creating your custom theme.

1. Copy folder `material_base_subtheme`
2. Rename folder and all name dependent files inside according your custom theme name.
3. Rename functions and libraries according your custom theme name.

<!-- TODO: provide filenames or better automatize process -->

For more information about subtheme template see [Custom subtheme template](subtheme-template.md).

Enabling theme
--------------

For enabling theme there are two options:

1. In site administrative interface, page Appearance
2. by Drush command `drush en THEMENAME`

Starting usage and further theme development
--------------------------------------------

Your next steps of preparing your custom theme for usage and development could be:

1. Defining needed [libraries](libraries.md)
2. Setting up [variables](variables.md)
3. [Building theme](build.md)
