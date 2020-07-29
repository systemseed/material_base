Footer
======

Material Base includes styling for footer and it's items.

Component implemented around Drupal "Footer" region and intended to show it's content.

Component options
-----------------

Layout options:

* Standard
* Roomy - larger inner spacing and vertical spacing between items. 

Layout options could be set on Appearance settings page ( /admin/appearance/settings ).

Footer items
------------

Supported footer items:

* Text blocks (Powered by Drupal, Custom block, etc.)
* One-level menu (Drupal menu block) - horizontal
* Two-level menu (Drupal menu block) - columns

Footer menus and Powered by Drupal block already includes default spacings. For achieving outer spacing for custom items (for example, Custom blocks), `footer-item` class could be used.

Classes for handling footer items visibility and alignment:

* `footer-item--center` - makes item be center aligned
* `footer-item--right` - makes item be right aligned. The Class should be added only to the first item of right aligned group. If first item is different per breakpoint, class should be added to all such items.
* `footer-item--full-with` - makes item to takes whole horizontal footer size. For One-level menu it could be used together with `footer-item--center` for centering menu items.  
* `visible-BREAKPOINT` - show item starting from `BREAKPOINT` (`sm`, `md`, `lg`)
* `visible-BREAKPOINT-inline` - show item as inline
* `visible-BREAKPOINT-flex` - show item as flex
* `hidden-BREAKPOINT` - hide item starting from `BREAKPOINT` (`sm`, `md`, `lg`)

Default footer item alignment is left and visibility is visible.

Adding classes for items possible with [Block class](https://www.drupal.org/project/block_class) module or similar.

Examples of usage
-----------------

### Text block (Copyrights, Credits, etc.)

Place Custom block (or any other text block) instance into Footer region.

Alternatively, the desired markup could be added directly to `region--footer.html.twig` template in your custom theme.

### One-level menu

Place some menu block instance into Footer region. Configure block for displaying 1 menu level.

### Two-level menu

Place some menu block instance into Footer region. Configure block for displaying 2 menu levels.
