Grid
====

Grid library of Material Base uses [Flexbox Grid](http://flexboxgrid.com/) library.

Flexbox Grid implements Bootstrap-like approach, uses same markup and class names.

Using grid
----------

Simple example:

~~~
<div class="row">
  <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
    <div>Content 1</div>
  </div>
  <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
    <div>Content 2</div>
  </div>
  <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
    <div>Content 3</div>
  </div>
</div>
~~~

More grid features and other examples could be found on project [page](http://flexboxgrid.com/).

Adjusting grid properties
-------------------------

It is possible to adjust amount of columns, inner and outer spacings, change or define additional classes for breakpoints and provide maximum container width.

Use corresponding variables in your custom theme `variables.scss` file:

* `$flexboxgrid-grid-columns: 12;` - set amount of column.
* `$flexboxgrid-gutter-width: $gutter;` - set inner spacing.
* `$flexboxgrid-outer-margin: $gutter;` - set outer spacing.
* `$flexboxgrid-max-width: $lg;` - set max container width.

For change or define additional classes for breakpoints used array:

~~~
$flexboxgrid-breakpoints:
  sm $sm auto,
  md $md auto,
  lg $lg $lg;
~~~

where:

* `sm`, `md`, `lg` - name of breakpoint and part of class names (`col-sm-8`, `col-md-6`, `col-lg-4`).
* `$sm`, `$md`, `$lg` - breakpoint values.
* `auto`, `auto`, `$lg` - max container widths per breakpoint.
