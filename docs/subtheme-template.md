Subtheme template
=================

Subtheme template structure
---------------------------

Subtheme template is placed in `material_base_subtheme` folder.

Subtheme template uses pretty much the same file [structure](/folder-structure.md) as a base theme (excluding itself, MDC subtheme, docs, and some other files).

Creating subtheme from template
-------------------------------

### Automatic generation subtheme files

Material base includes PHP script for generation subtheme based on `material_base_subtheme` folder.

Usage:

From Material Base theme folder:

~~~
php generate.php [themename] [path to themes folder]
~~~

If `path to themes folder` not provided, `../../custom` path name will be used by default.  
If `themename` not provided, `material_top` name will be used as theme name by default.  
If `themename` not provided and `PROJECT_NAME` environment variable is set, `material_PROJECT_NAME` will be used as theme name.

Examples:

~~~
php generate.php
php generate.php westeros
php generate.php westeros "../../custom"
php generate.php westeros "/var/www/html/web/themes/custom"
~~~

### Manual copying subtheme files

1. Copy `material_base_subtheme` folder and paste it to `PROJECTROOT/web/themes/custom`.
2. Rename the folder to your new theme name, for example, `westeros`.
3. Go to this folder and browse all files which contain `THEMENAME` in a filename. They all should be renamed according to your theme name, for example, `THEMENAME.info.yml` should become `westeros.info.yml`. List of files to rename:

    * `config/install/THEMENAME.settings.yml`
    * all files in `config/optional` folder
    * `THEMENAME.breakpoints.yml`
    * `THEMENAME.info.yml`
    * `THEMENAME.libraries.yml`
    * `THEMENAME.theme`
    
4. There are some values in file content that also should be replaced according to your theme name. These values also look like `THEMENAME`. It would be a good starting point to surf over all files and checks how the theme is organized and at the same time update values and probably even adjust some. List of files for obligatory to check (which contains placeholders):

    * all files in `config/optional` folder
    * `js/mdc.js`
    * `js/theme.js`
    * `composer.json`
    * `package.json`
    * `THEMENAME.breakpoints.yml`
    * `THEMENAME.info.yml`
    * `THEMENAME.theme`

5. Last but not least step for starting usage of your theme is removing `hidden: true` line from `THEMENAME.info.yml`, and provide more meaningful `name` and `description` values.
6. Flush caches, go to your site administrative interface > Appearance, and you should be able to "Install and set as default" your theme. Or you could do it by Drush command `drush en THEMENAME`.

Using right base theme
----------------------

In the subtheme template, in `THEMENAME.info.yml` file, the value of `base theme` (used for specifying base theme) is set to `material_base_mdc` which is a machine name of Material Base MDC theme. It's not a mistake, this theme has Material Base as it's base theme but also includes parts dependent on MDC library. This dividing was done due to technical reasons, you should consider Material Base MDC as an inseparable part of Material Base but always use Material Base MDC as the base theme.

Using Material Base as base theme directly is possible but not officially supported, do it only if you know what you doing.

Subtheme libraries
------------------

Probably the most useful feature of subthemes is managing libraries from the base theme. It allows you to avoid creating basic things from scratch and effectively reusing components defined in the base theme. However, it requires a deep understanding of how Drupal handles libraries and how Sass import works.

For using the library as it was built in the base theme it just needs to include it in your subtheme. All base theme libraries and functions inherited by default so in this case it just need to not exclude the library. For example `material_base/grid` library well usable by default and usually doesn't need to be adjusted.

For using the library with your project values (fonts, colors, sizing, etc.) it needs to build the whole library in your theme and use it instead of default one (override). For example `material_base/fonts` library contains Roboto font import and if it is not used on your project you have no reason to keep this library.

When the library contains parts which designed to be inherited or reused you could import such parts in the implementation of this library in your theme. For example, `material_base/base` library contains default values, mixins, and all components of the base theme but you probably need to rebuild them according to your project values. For this case you need to include needed files directly in your library sass index file `YOURLIBRARY.scss`:

~~~
@import "YOURLIBRARY/variables";
@import "../../contrib/material_base/scss/base/variables";
@import "../../contrib/material_base/scss/base/mixins";
@import "../../contrib/material_base/scss/base/extends";
@import "../../contrib/material_base/scss/base/layout";
@import "../../contrib/material_base/scss/base/typography";
@import "../../contrib/material_base/scss/base/helpers";
@import "../../contrib/material_base/scss/components";
~~~

Your theme variables file should always be imported first. Make sure that import paths match your project folder structure, and files are available by specified paths.
`THEMENAME/theme` library from the subtheme template contains the recommended way and order of importing library parts. It's intended to be used as a replacement of the `material_base/base` library from Material Base theme.

In a similar way `THEMENAME/mdc` library form subtheme template intended to be used as a replacement of `material_base_mdc/mdc` library from Material Base MDC theme.

For more info about libraries see [Libraries](/libraries.md) page.

