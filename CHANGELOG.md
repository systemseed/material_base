Material Base v2 development changes
====================================

Not released
----------

* Use "stable9" instead of "stable" as base theme.

06.08.2022
----------

* Updated MDC library from 7.0.0 to 14.0.0.
  Important change: MDC list implementation is in transition state to the new implementation and all usage of `mdc-list` (including `mdc-list-item` and `mdc-list-item-*`) should be replaced by `mdc-deprecated-list`.
* Updated Webpack from 4.x to 5.x.
  Update of `webpack.config.js`, `package.json`, `package-json.lock` and `yarn.lock` is required.
* Fixed uploadable fields, file and image.
  The fix requires changes from [#2752443](https://www.drupal.org/project/drupal/issues/2752443), for more details see [#3170746](https://www.drupal.org/project/material_base/issues/3170746)
* Fixed bug with multiple form submit button
* Compatibility with Drupal 10

28.08.2020
----------

* First beta release.
