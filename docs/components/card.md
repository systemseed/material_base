Card
====

Card component allows to display cards with several options and styles.

Component implemented as Twig template for including.

Accepted variables
------------------

- `data`:
    - `url`: The value for `href` attribute if using `a` tag or `data-url` attribute in other cases, for the whole card.
    - `media`: (render array) image or media. 
    - `label`: Tag or label.
    - `title`: Card title text.
    - `subtitle`: Card subtitle text.
    - `text`:  Card text.
    - `button`: ([button component](/components/button.md)) card action button.
- `settings`:
    - `attributes`: (object) element attributes.
    - `classes`: (array) classes for adding to the element.
    - `id`: HTML `id` attribute.
    - `tag`: HTML tag for the element: `'div'` (default), `'a'`.
    - `disabled`: (bool) makes card looks and behave as inactive.
    - `target`: HTML `target` attribute, for example `'_blank'`.

Component options
-----------------

Card component implements Card component from MDC library and support all it's features.

For more info see https://material.io/develop/web/components/cards

However it implements only one default layout (with media at the top and one action button). More layouts could be created with Twig blocks feature, see https://twig.symfony.com/doc/2.x/tags/block.html for more info.

Supported MDC library classes:

* "no classes" - default card 
* `mdc-card--outlined` - bordered card without elevation

Examples of usage
-----------------

### Card with action button

In Twig template file:

~~~
{% include "@material_base_mdc/components/03_organisms/card.twig" with {
  data: {
    title: 'Card title',
    text: 'Card text which contains detailed object decription.',
    button: {
      data: {
        label: 'Action',
        url: '/',
      },
      settings: {
        tag: 'a',
      },
    },
  },
} %}
~~~

Output: Card with title, text, and action button.

### Card link

In Twig template file:

~~~
{% include "@material_base_mdc/components/03_organisms/card.twig" with {
  data: {
    url: '/',
    title: 'Card title',
    text: 'Card text which contains detailed object decription.',
    button: {
      data: {
        label: 'Action',
      },
    },
  },
  settings: {
    tag: 'a',
  },
} %}
~~~

Output: Card Card with title, text, and action button but whole card surface behave as a link.
