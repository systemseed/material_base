Form
====

Material Base provides default styles and additional options for Drupal form elements.

For displaying and handling forms, Drupal modules or Drupal Form API could be used.
Form elements not intended to be used directly (via template including).

Component options
-----------------

Some of form elements implements components from MDC library and support most of their features.

Implemented MDC components:

* Text field (including textarea, helper text, and floating label)
* Checkbox
* Radio button

Rest of form elements uses default appearance provided by Drupal.

Some options provided by MDC library can not be configured via Drupal interface.

Outlined and Full width MDC options for text field could be achieved by passing corresponding values to `form-element--textfield.html.twig` template, by preprocess function, or overridding/including the template in your custom theme.

Full width MDC option for textarea could be achieved by passing `full_width = true` to `form-element--textarea.html.twig` template, by preprocess function, or overridding/including the template in your custom theme.

Character counter, prefix and suffix text, leading and trailing icons weren't implemented, however they could be easily added on template level.

### Clear input button

Clear input button could be added to text fields, such as search field.

In form element Twig template file:

~~~
{# Place this code right after {{ children }} or 'input' tag #}
<span class="input-clear">
  <svg class="icon input-clear__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/>
  </svg>
</span>
~~~

Output: Clear input button will be added to text field.
