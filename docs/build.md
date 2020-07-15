Building a theme
================

Material Base and it's subtheme template includes configured Webpack script for performing theme build tasks.
The base theme already packed with builded assets but for your custom theme you most likely needs to handle this process during theme development.

Installing dependencies
-----------------------

For installing build tools and it's dependences you needs to have [Yarn](https://yarnpkg.com/) globally installed. Using Yarn is recommended but NPM also should work.

1. Make sure you have all files copied from `material_base_subtheme` folder to your custom theme folder.
2. Optional: adjust values in `webpack.config.js`.
3. From your custom theme folder run:

~~~
yarn install
~~~

Building theme
--------------

Building script includes these tasks:

* Compiling Sass.
* Autoprefixing CSS.
* JS aggregation and minification.
* Creating map files for CSS and JS.
* Image assets optimizations for images from `images` folder.
* Generating SVG sprite for icons from `icons` folder.

All generated files will be put to `dist` folder.
Source files will not be changed. 

Building theme assets could be performed by running command from your custom theme folder:

~~~
yarn build
~~~

Watching files and rebuilding theme on changes
----------------------------------------------

Building theme assets continuously by watching files for changes could be performed by running command from your custom theme folder:

~~~
yarn develop
~~~

Adding CSS and JS files to build process
----------------------------------------

Build process (including watching) happens independently for different group of sources.
Usually group corresponds single library and includes CSS and JS assets.

For adding CSS and JS files to build process needs to specify library name and path to index files in `entry` section of `module.exports` array in `webpack.config.js`:

~~~
'LIBRARY-NAME': ['./js/JS-INDEX.js', './scss/SCSS-INDEX.scss']
~~~

Usually for index files names used same name as for the library.

By default Webpack always creating JS assets.
If you don't need JS for your library you could exclude it from building in `SuppressChunksPlugin` object in `webpack.config.js`:

~~~
{ name: 'LIBRARY-NAME', match: /\.js$|\.js\.map$/ },
~~~

Builded assets will be available in `dist` folder and could be used in [libraries](/libraries.md).
