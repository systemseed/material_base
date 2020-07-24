Overlay
=======

Material Base includes overlay for holding mobile menu and other stuff.

Component implemented around Drupal "Overlay" region and intended to show it's content.

Overlay items
-------------

Supported overlay items:

* Overlay open button (as navbar item)
* Overlay close button (built in template)
* Branding (Drupal site branding block)
* Menu, including 2 level submenus (Drupal menu block)

Custom items could be added on template level by overridding/including `region--overlay.html.twig` template in your custom theme.

Examples of usage
-----------------

### Branding

Place Site branding block instance into overlay region. Configure block for displaying needed elements.

### Default menu (MDC list)

Default menu support second menu level displayed as accordion by click. Menu items styled with MDC List component.
 
Place some menu block instance into Overlay region. Configure block for displaying needed menu deepness.

### Menu without MDC List styles

This implementation support second menu level displayed as accordion by click. Menu items styled without MDC List component.

Copy `menu--overlay.html.twig` from `templates/navigation` folder (not from `material_base_mdc/templates/navigation` folder) and paste to `templates/navigation` folder of your custom theme.
 
Place some menu block instance into Overlay region. Configure block for displaying needed menu deepness.
