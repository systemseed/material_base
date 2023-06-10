What is this?
=============

This is a definition of a theme that was used as a base theme for Material
Base before. So far we are keeping the `material_stable9.info.yml` file for
smooth uninstalling during the update. It will be removed in further versions.

How did it happen?
------------------

In Material Base 2.0.0 we introduced a "base" theme for Material Base.
In fact, it was just a copy of the Stable 9 theme pasted inside the Material
Base folder. It had been done for the sake of independency on Drupal Core
updates. However, user experience, showed it was the wrong decision.
The Stable 9 theme still sits in the Core of new Drupal versions, our own copy
of Stable 9 requires maintenance and produces unwanted bugs related to
template discovery. So it's time to fix it and move on.
