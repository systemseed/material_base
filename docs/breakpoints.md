Breakpoints
===========

Material Base provides default breakpoints and an option to change or add additional breakpoints by variables.

Default breakpoints
-------------------

Material Base provides well selected default breakpoints with naming in Bootstrap 3 flavour:

* `$ss: 360px;`
* `$ms: 480px;`
* `$xs: 576px;`
* `$sm: 768px;`
* `$md: 992px;`
* `$lg: 1200px;`
* `$xl: 1520px;`

Adjusting or adding breakpoints
-------------------------------

Breakpoint values can be added or changed in your custom theme `variables.scss` file.

Drupal breakpoints
------------------

Breakpoints for using within Drupal modules and configuration (such as Responsive Images module and Responsive image styles) are stored in `material_base.breakpoints.yml` and the same-looking file of your custom theme.

Breakpoint values of these files prefilled with default MB breakpoints values and should be updated manually if needed.

For more info about Drupal breakpoints see this [page](https://www.drupal.org/docs/theming-drupal/working-with-breakpoints-in-drupal).
