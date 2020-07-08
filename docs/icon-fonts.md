Icon fonts
==========

Icon fonts library of Material Base includes 5 iconic fonts from [Material Design Icons](https://material.io/resources/icons/) icon library:

* Material Icons
* Material Icons Outlined
* Material Icons Round
* Material Icons Sharp
* Material Icons Two Tone

All these fonts hosted on Google Fonts servers.

Using icons
-----------

Icons could be displayed with ligature font feature:

~~~
<i class="material-icons">face</i>
~~~

where:

* `material-icons` class is font theme, other values are `material-icons-outlined`, `material-icons-round`, `material-icons-sharp` and `material-icons-two-tone`
* `face` ligature is icon name, other values can be found [here](https://material.io/resources/icons/)

Icon font supports sizing and colorign by CSS the same way as regular fonts does.

For Two Tone icons coloring could be achieved differnt way:

~~~
.material-icons-two-tone {
  // color: blue; // won't work
  // fill: blue; // won't work
  filter: invert(0.5) sepia(1) saturate(10) hue-rotate(180deg);
}
~~~
