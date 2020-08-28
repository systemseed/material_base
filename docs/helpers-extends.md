Helpers and extends
===================

Material Base includes predefined classes for using in site building and content editing as well as in development.

Helpers
-------

Helpers is set of classes for using in site building and content editing.

* `hidden` - hides element
* `hidden-BREAKPOINT` - hides element starting from breakpoint
* `visible-BREAKPOINT` - displays element starting from breakpoint
* `visible-BREAKPOINT-inline` - displays element as inline starting from breakpoint
* `visible-BREAKPOINT-flex` - displays element as flex starting from breakpoint

Available `BREAKPOINT` values: `sm`, `md`, `lg`.

* `bg-COLOR` - set background color and related text color
* `text-COLOR` - set text color
* `text-on-COLOR` - set text color related to background

Available `COLOR` values:

* `primary`
* `primary-light`
* `primary-dark`
* `secondary`
* `secondary-light`
* `secondary-dark`
* `accent`
* `accent-light`
* `accent-dark`
* `light`
* `dark`

Extends
-------

Extends is set of classes for using in site building and development. Classes could be used directly in markup or applied to any selector with `@extend` Sass function.

* `container` - make element behave as container (inner spacing, maximum width, centered horizontally)
* `container-fluid` - make element behave as container without maximum width (inner spacing)
* `row` - make element behave as grid row (compensation of columns spacings)
* `clearfix` - removes content floating

### Spacings

* `spacing-SIDE-VALUE` - applies spacing by side and value
* `spacing-SIDE-none` - unsets spacing by side and value
* `spacing-inner-my-none` - unset top spacing from first child and bottom spacing from last child
* `spacing-inner-mx-none` - unset left spacing from first child and right spacing from last child

Available `SIDE` values: 

* `mt` - outer top
* `mb` - outer bottom
* `my` - outer top and bottom
* `ml` - outer left
* `mr` - outer right
* `mx` - outer left and right
* `pt` - inner top
* `pb` - inner bottom
* `py` - inner top and bottom
* `pl` - inner left
* `pr` - inner right
* `px` - inner left and right

Available responsive `VALUE` values: `small`, `standard`, `large`.<br />
Available fixed `VALUE` values: from 1 to 24, where number is multiplier of "spacing" variable value (default is 8px).

### Titles

* `h1`-`h6`
* `page-title-VALUE`
* `block-title-VALUE`

Available `VALUE` values: `small`, `standard`, `large`.



