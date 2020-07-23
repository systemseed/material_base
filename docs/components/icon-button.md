Icon button
===========

Icon button component allows to display buttons which contains only icon.

Component implemented as Twig template for including.

Accepted variables
------------------

- `data`:
    - `url`: The value for `href` attribute if using `a` tag or `data-url` attribute in other cases.
    - `icon`: ([icon component](/components/icon.md)) icon for display.
- `settings`:
    - `attributes`: (object) element attributes.
    - `classes`: (array) classes for adding to the element.
    - `id`: HTML `id` attribute.
    - `disabled`: (bool) makes button looks and behave as inactive.
    - `tag`: HTML tag for the element: `'button'` (default), `'a'`, `'span'`.
    - `label`: The value for `aria-label` attribute.
    - `target`: The value for `data-target` attribute. 

Component options
-----------------

Icon button component implements Icon button component from MDC library and support most of it's features.

Toggle icon currently not supported.

For more info see https://material.io/develop/web/components/buttons/icon-buttons

It is also possible to use icon button without MDC styles.

Examples of usage
-----------------

### Button with icon from SVG sprite

In Twig template file:

~~~
{% include "@material_base_mdc/components/02_molecules/icon-button.twig" with {
  data: {
    icon: {
      data: {
        value: 'info',
      },
      settings: {
        type: 'svg-sprite',
      },
    },
  },
} %}
~~~

Output: Button with `info` icon from SVG sprite.

### Unstyled icon button

In Twig template file:

~~~
{% include "@material_base/components/02_molecules/button.twig" with {
  data: {
    icon: {
      data: {
        value: 'info',
      },
      settings: {
        type: 'svg-sprite',
      },
    },
  },
} %}
~~~

Output: Native button with `info` icon from SVG sprite.
