Style guide
===========

Material Base contains a template file with a demo of most of theme components. It can be used as a simple style guide and usage reference.

To show style guide on your site, follow this steps:

1. Create a node with URL alias `/style-guide`.
2. In your custom theme create a file `tempates/content/node--style-guide--full.html.twig` with following content:

  ```
  {% extends "node--style-guide--full--example.html.twig" %}
  ```

3. Clear site cache.
4. Go to newly created page i.e. example.com/style-guide.

To add custom components to the style guide, on step 2 copy content of `material_base/themes/material_base_mdc/templates/content/node--style-guide--full--example.html.twig` and paste it to file instead of extending template. Now you can modify template content as needed.
