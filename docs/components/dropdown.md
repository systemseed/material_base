Dropdown
========

Material Base provides JS and minimal styles for creating dropdowns.

[Button component](/components/button.md) could be used as Dropdown toggle as well.

Component implemented as CSS classes for using in markup.

Component classes
-----------------

* `mb-dropdown` - dropdown root element
* `mb-dropdown__toggle` - dropdown toggle
* `mb-dropdown__panel` - dropdown content panel
* `mb-dropdown__group` - (optional) wrapper for hadling dropdown group behaviour

Examples of usage
-----------------

### Generic dropdown

Markup:

~~~
<div class="mb-dropdown">
  <div class="mb-dropdown__toggle">
    Dropdown toggle
  </div>
  <div class="mb-dropdown__panel">
    Dropdown content
  </div>
</div>
~~~

Output: Generic dropdown element.

### Dropdown button

In Twig template file:

~~~
<div class="mb-dropdown">
  {% include "@material_base_mdc/components/02_molecules/button.twig" with {
    data: {
      label: 'Dropdown toggle',
    },
    settings: {
      classes: ['mb-dropdown__toggle'],
    },
  } %}
  <div class="mb-dropdown__panel">
    Dropdown content
  </div>
</div>
~~~

Output: Button which toggles dropdown panel.
