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
|       |-- app.min.js        # all minified scripts
|       |-- jquery.min.js  
|
|-- kit/                      # Working files
|   |-- assets/               # scss and js
|       |-- scss/             # scss files
|           |-- app.scss      # main scss imports
|           |-- fonts.scss    # font base64 imports
|      
|           |--tools/         # Mixins and placeholder extends 
|               |--- _config.scss # master config and sass vars 
|               |--- _grids.scss 
|               |--- _animations.scss 
|               |--- _etc...
|           |-- base/
|               |--  _typography.scss    
|               |--- _media.scss # global mixins
|               |--  _forms.scss      
|           |--components/  
|               |-- _buttons.scss      
|               |-- _masts.scss    
|               |-- _ctas.scss     
|               |-- _intros.scss  
|               |-- etc...  
|           |--regions/
|               |-- _site-header.scss
|               |-- _site-footer.scss       
|               |-- _filterbar.scss
|           |--helpers/
|               |-- _grid.scss      
|               |-- _helpers.scss  
|               |-- _animations.scss   
|           |-- vendor/ 
|               |-- _normalizer.scss 
|
|       |-- js/            # js files
|           |-- vendor/    
|           |-- components/    
|               |-- _site-nav.js   
|               |-- _popups.js
|               |-- _etc...   
|           |-- _inits # site inits 
|
```

## Wordpress Structre

```
|-- inc/                      
|   |-- admin/  
|       |-- admin-theme             
|
|   |-- post-types
|       |-- post-type-name.php      
|
|   |-- functions                    
|       |-- class-acf-modules.php              
|       |-- styles-scripts.php     
|       |-- post-templates.php       
|       |-- loops.php               
|       |-- etc...                
|       |-- editor.php               
|       |-- helpers.php              
|       |-- loops.php               
|       |-- nav.php                 
|       |-- pagination.php           
|       |-- socials.php            
|       |-- users.php              
|       |-- modules.php             
|
|  |-- settings                      
|
|-- page-templates/                  
|   |-- home.php                
|
|-- partials/                        
|   |-- content/                     
|       |-- content-posts.php        
|       |-- content-etc.php         
|       |-- etc...
|   |-- modules/                    
|       |-- content-module.php 
|       |-- image-module.php 
|       |-- etc...
|   |-- partials-head.php            
|   |-- partials-header.php          
|   |-- partials-footer.php          
|   |-- etc...
```
