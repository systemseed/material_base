Menu dropdown
=============

Material Base provides JS for handling menu dropdowns.

Menu dropdown component uses Menu component from MDC library and support all it's features.

[Button component](/components/button.md) could be used as menu dropdown toggle as well.

Component implemented as CSS classes for using in markup.

Component classes
-----------------

* `mdc-menu-dropdown` - menu dropdown root element
* `mdc-menu-dropdown__toggle` - menu dropdown toggle
* `mdc-menu` - dropdown menu (MDC component)
* `mdc-menu-dropdown__group` - (optional) wrapper for hadling menu dropdown group behaviour

Examples of usage
-----------------

### Button with menu dropdown 

In Twig template file:

~~~
<div class="mdc-menu-dropdown">
  {% include "@material_base_mdc/components/02_molecules/button.twig" with {
    data: {
      label: 'Dropdown',
    },
    settings: {
      classes: ['mdc-menu-dropdown__toggle'],
    },
  } %}
  <div class="mdc-menu-surface--anchor">
    <div class="mdc-menu mdc-menu-surface" data-mdc-auto-init="MDCMenu">
      <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1" data-mdc-auto-init="MDCList">
        <li class="mdc-list-item" role="menuitem" data-mdc-auto-init="MDCRipple">
          <span class="mdc-list-item__ripple"></span>
          <span class="mdc-list-item__text">A Menu Item</span>
        </li>
        <li class="mdc-list-item" role="menuitem" data-mdc-auto-init="MDCRipple">
          <span class="mdc-list-item__ripple"></span>
          <span class="mdc-list-item__text">Another Menu Item</span>
        </li>
      </ul>
    </div>
  </div>
</div>
~~~

Output: Button with menu dropdown.
