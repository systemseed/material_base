Button
======

Button component allows to display buttons with several options and styles.

Component implemented as Twig template for including.

Accepted variables
------------------

- `data`:
    - `label`: Button text.
    - `url`: The value for `href` attribute if using `a` tag or `data-url` attribute in other cases.
    - `icon`: ([icon component](/components/icon.md)) icon for showing beside the button text.
- `settings`:
    - `attributes`: (object) element attributes.
    - `classes`: (array) classes for adding to the element.
    - `disabled`: (bool) makes button looks and behave as inactive.
    - `id`: HTML `id` attribute.
    - `tag`: HTML tag for the element: `'button'` (default), `'a'`, `'span'`.
    - `target`: HTML `target` attribute, for example `'_blank'`.
    - `icon_trailing`: (bool) allows to display the icon at the right of button text. By default icon displayed at the left.

Component options
-----------------

Button component implements Button component from MDC library and support all it's features.

For more info see https://material.io/develop/web/components/buttons  

Supported MDC library classes:

* "no classes" - default button 
* `mdc-button--outlined` - outlined button
* `mdc-button--raised` - contained button
* `mdc-button--unelevated` - contained button without elevation

Additional MB classes:

* `button--secondary` - secondary color button
* `button--light` -  light color button

Default button color is primary.

It is also possible to use button without MDC styles.

Examples of usage
-----------------

### Simple button

In Twig template file:

~~~
{% include "@material_base_mdc/components/02_molecules/button.twig" with {
  data: {
    label: 'Button text',
  },
} %}
~~~

Output: Default button.

### Link button

In Twig template file:

~~~
{% include "@material_base_mdc/components/02_molecules/button.twig" with {
  data: {
    label: 'Button text',
    url: '/contacts'
  },
  settings: {
    classes: ['mdc-button--unelevated'],
    tag: 'a',
  },
} %}
~~~

Output: Link button, contained, without elevation.

### Button with icon

In Twig template file:

~~~
{% include "@material_base_mdc/components/02_molecules/button.twig" with {
  data: {
    label: 'Button text',
    icon: {
      data: {
        value: 'chevron_right',
      },
      settings: {
        type: 'svg-sprite',
      },
    },
  },
  settings: {
    icon_trailing: TRUE,
  },
} %}
~~~

Output: Default button with trailing `chevron_right` icon from SVG sprite.

### Unstyled button

In Twig template file:

~~~
{% include "@material_base/components/02_molecules/button.twig" with {
  data: {
    label: 'Button text',
  },
} %}
~~~

Output: Native button without styling.
