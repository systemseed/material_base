Search
======

Material Base provides styles and JS for supporting searches created with [Search API](https://www.drupal.org/project/search_api) module. Also supported input autocomplete provided by [Search API Autocomplete](https://www.drupal.org/project/search_api_autocomplete) module. Search module from Drupal core may also be used, but it is not officially supported.

Component implemented as CSS classes for using in markup.

Component options
-----------------

Implemented elements:

* Search form (with and without autocomplete)
* Search toggle button
* Search close button
* Search result snippet

Click on Search toggle or Search close buttons will add/remove `search-open` class to the `body` tag.

Component classes
-----------------

### Search field

* `search-field` - search field root element
* `search-field__group` - group containing icon and input field
* `search-field__icon` - search icon

### Search toggle button

* `search-toggle` - search toggle root element
* `search-toggle__button` - toggle button
* `search-toggle__icon` - search toggle icon

### Search close button

* `search-close` - search close root element
* `search-close__button` - close button
* `search-close__icon` - close icon

### Search result snippet

* `search-results-list__item` - search result wrapper
* `item-title` - search result title
* `item-content` - search result excerpt
* `item-footer` - link to the result page

Elements markup examples
------------------------

### Search field

~~~
<div class="form-item form-no-label search-field">
  <div class="search-field__group">
    <svg class="icon search-field__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
      <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
    </svg>
    <input placeholder="Search" type="text" size="30" maxlength="128">
  </div>
</div>
~~~

### Search toggle button

~~~
<div class="search-toggle">
  <button class="search-toggle__button">
    <svg class="icon search-toggle__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
      <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
    </svg>
  </button>
</div>
~~~

### Search close button

~~~
<div class="search-close">
  <button class="search-close__button">
    <svg class="icon search-close__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
      <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
    </svg>
  </button>
</div>
~~~

### Search result snippet

~~~
<article class="search-results-list__item">
  <h3 class="item-title">
    <a href="https://example.com/result-page-url">Search result title</a>
  </h3>
  <div class="item-content">
    Search result excerpt …
  </div>
  <footer class="item-footer">
    <a href="https://example.com/result-page-url" rel="bookmark">https://example.com/result-page-url</a>
  </footer>
</article>
~~~
