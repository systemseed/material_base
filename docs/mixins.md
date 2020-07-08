Mixins
======

Breakpoint mixin
----------------

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
