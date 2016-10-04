<?php
/*-------------------------------------------*/
/* jumpoff_menu_order
/*  More logical custom menu ordering, using custom_menu_order filtering
/*-------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function jumpoff_menu_order($menu_order) {
  if (!$menu_order) return true;
  
  return array(
    'index.php',                    // Dashboard
    'edit.php?post_type=page',      // Pages
    'edit.php',                     // Posts
    'edit-comments.php',            // Comments
    'edit.php?post_type=industries',  // Industries
    'edit.php?post_type=products',    // Products
    'edit.php?post_type=case-studies',  // Case Studies
    'edit.php?post_type=events',      // Events
    'edit.php?post_type=events',    // Events
    'globals',                      // Globals (options table)
    'wpcf7',                        // Contact
    'upload.php',                   // Media
    'users.php',                    // Users
    'separator2',                   // Second separator
    'plugins.php',                  // Plugins
    'tools.php',                    // Tools
    'options-general.php',          // Settings
    'themes.php',                   // Appearance
  );
}

add_filter('custom_menu_order', 'jumpoff_menu_order'); // Activate 
add_filter('menu_order', 'jumpoff_menu_order');
?>