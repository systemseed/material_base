Icon
====

Icon component allows to display different types of icons:

* Icons from iconic fonts
* Icons from SVG sprite
* Raw icon markup, for example by `img` or `svg` tags.

Accepted variables
------------------

- `data`:
    - `value`: Icon machine name (for `font` and `svg-sprite` types) or markup.
- `settings`:
    - `type`: Icon source type.
    - `classes`: (array) classes for adding to the element.
      For example, `material-icons`, `material-icons-outlined`, `fas`, etc.

Supported `type` values:

* `'font'` - for using iconic fonts 
* `'svg-sprite'` - for using SVG icon sprite
* `FALSE` - for using with raw markup

Examples of usage
-----------------

### Icons from iconic fonts

In Twig template file:

~~~
{% include "@material_base/components/01_atoms/icon.twig" with {
  data: {
    value: 'face',
  }, 
  settings: {
    type: 'font',
    classes: ['material-icons'],
  }
} %}
~~~

Output:

~~~
<i class="icon material-icons" aria-hidden="true">face</i>
~~~

### Icons from SVG sprite

In Twig template file:

~~~
{% include "@material_base/components/01_atoms/icon.twig" with {
  data: {
    value: 'chevron_right',
  },
  settings: {
    type: 'svg-sprite',
  }
} %}
~~~

Output:

~~~
<svg class="icon"><use xlink:href="#chevron_right"></use></svg>
~~~

### Raw icon markup

In Twig template file:

~~~
{% include "@material_base/components/01_atoms/icon.twig" with {
  data: {
    value: '<img class="icon" src="chevron_right.svg" />',
  },
} %}
~~~

Output:

~~~
<img class="icon" src="chevron_right.svg" />
~~~
