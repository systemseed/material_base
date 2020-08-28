Chip
====

Material Base includes custom implementation of Material Design chips for using with Drupal checkboxe form item.

MDC library chip component wasn't implemented yet.

Component implemented as alternative template for checkbox form element which needs to be used insted of default one, for example, by extendending Drupal template suggestions.

Accepted variables
------------------

Template accept all default `form-element` template variables and additionaly these ones:

- `outlined`: (bool) makes chip looks outlined.
- `icon`: ([icon component](/components/icon.md)) icon for showing beside the chip text.

Component options
-----------------

Supported options:

* Outlined
* Chip icon

These options can not be configured via Drupal interface.

Appling options could be achieved by passing corresponding values to `form-element--checkbox--chip.html.twig` template, by preprocess function, or overridding/including the template in your custom theme.

Examples of usage
-----------------

### Default chip

In checkbox form element Twig template:

~~~
{% include "form-element--checkbox--chip.html.twig" } %}
~~~

Output: Default chip

### Outlined chip with icon

In checkbox form element Twig template:

~~~
{% include "form-element--checkbox--chip.html.twig" with {
  outlined: true,
  icon: {
    data: {
      value: 'filter_list',
    },
    settings: {
      type: 'font',
      classes: ['material-icons'],
    },
  }
} %}
~~~

Output: Outlined chip with icon
