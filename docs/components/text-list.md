Text list
=========

Material Base provides several styles for HTML lists elements (`ul`, `ol`).

Do not be confused with List component from MDC library, text list intended to be used in texts, without selecting option.

Component implemented as CSS classes for using in markup.

Component classes
-----------------

`text-list` - list wrapper, provides default list styles.

Additional classes:

* `text-list text-list--unstyled` -  list without markers
* `text-list text-list--bulleted` -  list with brand colored bullets
* `text-list text-list--iconed` -  list with icons

Examples of usage
-----------------

### Default list style

~~~
<ul class="text-list">
  <li>List item 1</li>
  <li>List item 2</li>
  <li>List item 3</li>
</ul>
~~~

Output: List with default bullets

### Iconed list

~~~
<ul class="text-list text-list--iconed">
  <li><i class="icon material-icons">done</i>List item 1</li>
  <li><i class="icon material-icons">done</i>List item 2</li>
  <li><i class="icon material-icons">done</i>List item 3</li>
</ul>
~~~

Output: List with icons
