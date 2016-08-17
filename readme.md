# The Jumpoff WP Kit
A Wordpress starter theme and front-end framework for CodeKit

## Dependencies
-CodeKit: for minification, linting, and js + html includes (more on that below).
-Wordpress: for, eh, Wordpress.
-Jquery: for js



## Modules
functions/modules is a module loader for ACF Flexible Content Fields which enables drag and drop content creation. Just name your Flexible Content Fields after your related module file (ie; content-module.php). 

Call modules inside templates like so:

```
<?php while (has_sub_field('modules')) : ?>
  <?php ACF_Modules::render(get_row_layout()); ?>
<?php endwhile; ?>
```

## Transitioning from Static to WP
Simple take the kit folder form the static projects and replace the kit folder in the wp project. Then replace global headers and footers and create page tempaltes from each static page.

## Project Structre
The kit folder includes the working files for scss and js, which minify and build to a similarly named assets folder in the root.
For Wp, we organize loops and partials into a partials folder, and various includes and funcitons in a inc folder.


## Codekit and SCSS/JS Structre
```
|-- assets/                   # The Build folder
|   |-- css/      
|       |-- app.min.scss      # all styles minified
|       |-- fonts.min.scss    # minified base64 font-face
|
|   |-- js 
|       |-- plugins.min.js    # all minified plugins
|       |-- scripts.min.js    # minified init and one off scripts
|       |-- jquery.min.js  
|       |-- modernizr.js   
|
|-- kit/                      # Working files
|   |-- assets/               # scss and js
|       |-- scss/             # scss files
|           |-- app.scss      # main scss imports
|           |-- fonts.scss    # font base64 imports
|      
|           |--tools/
|               |--- _config.scss # master config and sass vars 
|               |--- _mixins.scss # global mixins
|               |--- _extends.scss # global extends and themes
|           |-- fonts/
|           |-- base/
|               |--  _typography.scss    
|               |--- _media.scss # global mixins
|               |--- _colors.scss
|               |--  _decor.scss  
|               |--  _forms.scss       
|           |--components/  
|               |-- _buttons.scss      
|               |-- _feeds.scss    
|               |-- _ctas.scss    
|               |-- _folio.scss    
|               |-- _intros.scss  
|               |-- _jobs.scss    
|               |-- etc...  
|           |--regions/
|               |-- _header.scss
|               |-- _header-menu.scss
|               |-- _footer.scss            
|           |--utils/
|               |-- _grid.scss      
|               |-- _helpers.scss  
|               |-- _animations.scss   
|               |-- etc... 
|           |-- vendor/ 
|               |-- _normalizer.scss 
|
|       |-- js/               # js files
|           |-- jquery.js     # yep... still rocking jquery
|           |-- app.js        # script appends/prepends/includes
|           |-- _init.js      # inits
|           |-- vendor/       # vendor libs
|           |-- components/   # js components
|
```

## Wordpress Structre

```
|-- inc/                      
|   |-- admin-styles/      
|       |-- admin-styles.min.css     # Admin Styles, minifed
|       |-- admin-styles.scss        # Admin styles, working
|
|   |-- cpts 
|       |-- post-types.php           # Custom Post Types & Taxonomies
|
|   |-- functions                    # Functions, called in functions.php
|       |-- admin.php                # admin related functions (appearance, editor, post filters)
|       |-- settings.php             # wp defulat settings (images, permalinks, etc)
|       |-- theme-support.php        # register theme support (thumbnails, post formats, etc)
|       |-- styles-scripts.php       # Scripts and Styles load and enqueue  
|       |-- cleanup.php              # Cleanups 
|       |-- users.php                # User related functions 
|       |-- dash.php                 # Dashboard related functions 
|       |-- editor.php               # Post Editor 
|       |-- helpers.php              # Helpers (excerpts, paths, cats, etc)
|       |-- loops.php                # Modular Loop helpers
|       |-- nav.php                  # Nav functions
|       |-- pagination.php           # Paginaiton
|       |-- socials.php              # Social integration funcitons
|       |-- users.php                # User related functions 
|       |-- modules.php              # Module loader class for ACF Flexible Content
|
|-- page-templates/                  # Custom Page Templates
|   |-- home.php                
|
|-- partials/                        # Partials, Loops, and modular elements
|   |-- content/                     # Loop content
|       |-- content-posts.php        # scss files
|       |-- content-etc.php         
|       |-- etc...
|   |-- modules/                     # Modules (via ACF and module loader at inc/functions/modules)
|       |-- content-module.php 
|       |-- image-module.php 
|       |-- etc...
|   |-- partials-head.php            # global head content, called in header.php
|   |-- partials-header.php          # global header content, called in header.php
|   |-- partials-footer.php          # global footer content, called in header.php
|       |-- etc...
```
