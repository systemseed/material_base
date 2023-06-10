Drawer
======

Material Base includes drawer for holding mobile menu and other stuff.

Component implemented around Drupal "Drawer" region and intended to show it's content.

Overlay items
-------------

Supported drawer items:

* Drawer open button (as navbar item)
* Branding (Drupal site branding block)
* Menu, including 2nd level submenus (Drupal menu block)

Custom items could be added on template level by overridding/including `region--drawer.html.twig` template in your custom theme.

Examples of usage
-----------------

### Branding

Place Site branding block instance into drawer region. Configure block for displaying needed elements.

### Default menu (MDC list)

Default menu support second menu level displayed as accordion by click. Menu items styled with MDC List component.
 
Place some menu block instance into Drawer region. Configure block for displaying needed menu deepness.

### Menu without MDC List styles

This implementation support second menu level displayed as accordion by click. Menu items styled without MDC List component.

Copy `menu--drawer.html.twig` from `templates/navigation` folder (not from `material_base_mdc/templates/navigation` folder) and paste to `templates/navigation` folder of your custom theme.
 
Place some menu block instance into Drawer region. Configure block for displaying needed menu deepness.
