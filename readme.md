# The Jumpoff WP Kit
A Wordpress starter theme and front-end framework for CodeKit

## Dependencies
-CodeKit: for minification, linting, and js + html includes (more on that below).
-Wordpress: for, eh, Wordpress.
-Jquery: for js

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
|           |-- base/
|               |--- _config.scss
|               |--- _mixins.scss
|               |--- _colors.scss
|               |--  _media.scss  
|               |--  typography.scss      
|           |--components/  
|               |-- _animations.scss  
|               |-- _buttons.scss      
|               |-- _grid.scss    
|               |-- etc...  
|           |--partials/
|               |-- _header.scss
|               |-- _footer.scss       
|               |-- _posts.scss     
|           |--pages/
|               |-- _home.scss      
|               |-- _about.scss  
|               |-- _etc...  
|           |-- vendor/ 
|               |-- _normalizer.scss 
|
|       |-- js/             # js files
|           |-- scripts.js  # working scripts
|           |-- plugins.js  # imported plugins
|           |-- plugins/    # plugin import files
|               |-- _easings.js   
|               |-- _tabs.js
|               |-- _etc...   
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
|   |-- customfields
|       |-- custom-fields.php        # custom-fields saves
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
|
|-- page-templates/                  # Custom Page Templates
|   |-- home.php                
|
|-- partials/                        # Partials, Loops, and modular elements
|   |-- content/                     # Loop content
|       |-- content-posts.php        # scss files
|       |-- content-etc.php         
|   |-- partials-head.php            # global head content, called in header.php
|   |-- partials-header.php          # global header content, called in header.php
|   |-- partials-footer.php          # global footer content, called in header.php
|   |-- post-author.php              # modular sections
|
|-- resources/                       # a place to save working files and notes, ie PSDs, Icon Project Json files, etc
```
