SVG Icons sprite
================

Build script of Material Base and Material Base Subtheme contains a function for automatic generation SVG sprite from icons (or any other SVG images) placed in `icons`.

Adding icons to the sprite
--------------------------

For adding new icons to a sprite file needs to place SVG files to `icons` and run [build](/build.md) theme process. Built sprite will be available by path `dist\images\isons.svg` and will be imported on every page automatically. Sprite file and containing icons will not be visible on the pages, it needs to define usage somewhere for showing the icon. 

Using icons
-----------

Icons could be displayed with "use" tag SVG feature:

~~~
<svg class="icon"><use xlink:href="#FILE_NAME"></use></svg>
~~~

where:

* `FILE_NAME` is the name of SVG file with the desired icon which was previously paced in `icons` folder.

SVG icons support sizing by CSS the same way as any block element.

~~~
.icon {
  display: block;
  width: 48px;
  height: 48px;
}
~~~

SVG icons support coloring by CSS fill property. For using CSS fill, the source SVG file shouldn't contain fill properties for its elements.

~~~
.icon {
  fill: blue;
}
~~~

For complex cases with different elements coloring and other advanced features, JS could be used.
