Material Base 2.x
=================

Grid
----

Grid system uses [Flexbox Grid](http://flexboxgrid.com/).

Flexbox Grid implements Bootstrap-like approach, uses same markup and class names.

Exemples:

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

Mixins
------

### Breakpoint mixin

Breakpoint mixin uses Bootstrap syntax but also allow to use custom size values.

Available mixins:

* `media-breakpoint-up($min-size)`
* `media-breakpoint-down($max-size)` 
* `media-breakpoint-between($min-size, $max-size)` 

For `$max-size` 1 pixel deducted automatically. 

Examples:

~~~
@include media-breakpoint-up($md) {
  // some styles here
}

@include media-breakpoint-down($md) {
  // some styles here
}

@include media-breakpoint-down(400px) {
  // some styles here
}
~~~
