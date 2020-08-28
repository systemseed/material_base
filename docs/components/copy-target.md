Copy target
===========

Material Base includes [clipboard.js](https://clipboardjs.com/) library for supporting copying text to the clipboard.

Component implemented as CSS classes for using in markup.

Component classes
-----------------

* `copy-target` - root element
* `copy-target__button` - button, text for copying should be passed to `data-target` attribute
* `copy-target__tooltip` - optional tooltip

Examples of usage
-----------------

### Using as markup

Markup:

~~~
<div class="copy-target">
  <button data-target="Text to copy" class="mdc-icon-button copy-target__button">
    <i class="icon material-icons mdc-icon-button__icon">content_copy</i>
  </button>
  <div class="tooltip copy-target__tooltip">
    Copied to clipboard
  </div>
</div>
~~~

Output: Button for copying text.

### Using in templates

In Twig template file:

~~~
<div class="copy-target">
  {% include "@material_base_mdc/components/02_molecules/icon-button.twig" with {
    data: {
      icon: {
        data: {
          value: 'content_copy',
        },
        settings: {
          type: 'svg-sprite',
        },
      },
    },
    settings: {
      target: 'Text to copy',
      classes: ['copy-target__button'],
    },
  } %}
  <div class="tooltip copy-target__tooltip">
    Copied to clipboard
  </div>
</div>
~~~

Output: Button for copying text.
