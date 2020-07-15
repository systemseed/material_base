Setup
=====

Creating subtheme
-----------------

Material Base is a "base" theme which means it's not intended for direct usage. In most cases, you will need to create "subtheme" and specify Material Base as a "base" theme.
It will allow you to keep MB updated and avoid manually updating your custom theme.

For more information info about subtheming see this [page](https://www.drupal.org/docs/theming-drupal/creating-sub-themes).

You could create your subtheme from scratch or use a template included in MB (recommended).

Folder `material_base_subtheme` contains the template for creating your custom theme.

For detailed information about how to create subtheme from template see [Custom subtheme template](/subtheme-template.md).

Enabling theme
--------------

For enabling theme there are two options:

1. In site administrative interface, page Appearance
2. by Drush command `drush en THEMENAME`

Starting usage and further theme development
--------------------------------------------

Your next steps of preparing your custom theme for usage and development could be:

1. Defining needed [libraries](/libraries.md)
2. Setting up [variables](/variables.md)
3. [Building theme](/build.md)
