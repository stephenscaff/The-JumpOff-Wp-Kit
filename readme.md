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
|       |-- app.min.js   
|
|-- kit/                      # Working files
|   |-- assets/               # scss and js
|       |-- scss/             # scss files
|           |-- app.scss      # main scss imports
|           |-- fonts.scss    # font base64 imports
|
|           |-- tools/
|               |--- _config.scss
|               |--- _extends-type.scss
|               |--- _mixins-type.scss
|               |--- _mixins-modules.scss
|               |--- _mixins-animations.scss 
|           |-- base/
|               |--- _forms.scss
|               |--- _links.scss
|               |--- _lists.scss
|               |--  _media.scss  
|               |--  _typography.scss      
|           |--components/  
|               |-- _animations.scss  
|               |-- _buttons.scss      
|               |-- _grid.scss    
|               |-- etc...  
|           |--partials/regions/
|               |-- _header-site.scss
|               |-- _header-menu.scss
|               |-- _header-drawer.scss
|               |-- _footer-site.scss       
|           |--utils/
|               |-- _helpers.scss    
|               |-- _helpers-decor.scss    
|               |-- _helpers-colors.scss      
|               |-- _themes.scss  
|               |-- _grid.scss  
|               |-- _animations-keyframes.scss  
|               |-- _animations-scrolling.scss  
|               |-- _etc...  
|           |-- vendor/ 
|               |-- _bg-vids.scss 
|               |-- _slick.scss 
|               |-- _etc...  
|
|       |-- js/                   # js files
|           |-- _init.js          # working scripts
|           |-- app.js            # imported components and inits
|           |-- components/       # components
|               |-- _popups.js   
|               |-- _page-transitions.js
|               |-- _instagrammin.js
|               |-- signup.js
|               |-- _etc...   
|
```

## Wordpress Structre

```
|-- acf-json/                         # JSON Stored custom fields
|      
|-- inc/                      
|   |-- admin/      
|   |-- cleanup/  
|   |-- feeds/                     
|   |-- fields/                    
|       |-- class-acf-modules.php     
|   |-- helpers/                  
|   |-- load-more/                         
|   |-- loaders/       
|   |-- paths/                  
|   |-- post-helpers/                       
|   |-- post-types/  
|   |-- settings/
|   |-- shortcodes/  
|   |-- utils/   
|   |-- woo/    

|-- partials 
|   |-- content/   
|   |-- modules/
|
|-- woocommerce/                      # Woo tempalte overrides
|-- woocommerce-swatches/             # Woo tempalte overrides
|-- woocommerc-gateway-stripe/        # Woo tempalte overrides

```
