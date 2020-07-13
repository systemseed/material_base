Icon button
===========

Icon button component allows to display buttons which contains only icon.

Accepted variables
------------------

- `data`:
    - `url`: The value for `href` attribute if using `a` tag or `data-url` attribute in other cases.
    - `icon`: ([icon component](components/icon.md)) icon for display.
- `settings`:
    - `label`: The value for `aria-label` attribute.
    - `target`: The value for `data-target` attribute. 
    - `classes`: (array) classes for adding to the element.
    - `disabled`: (bool) Makes button looks and behave as inactive.
    - `id`: HTML `id` attribute.
    - `tag`: HTML tag for the element: `'button'` (default), `'a'`, `'span'`.

Toggle icon from MDC library currently not supported.

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
