<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *  More logical custom menu ordering, 
 *  using custom_menu_order filtering
 * 
 *  @return $menu_order 
 */

function jumpoff_menu_order($menu_order) {
  if (!$menu_order) return true;
  
  return array(
    'index.php',                            // Dashboard
    'edit.php?post_type=page',              // Pages
    'edit.php',                             // Posts
    'edit.php?post_type=industries',        // Industries
    'edit.php?post_type=products',          // Products
    'edit.php?post_type=case-studies',      // Case Studies
    'edit.php?post_type=press-releases',    // Press Releases
    'edit.php?post_type=team',              // Team
    'edit.php?post_type=jobs',              // Jobs
    'globals',                              // Globals (options table)
    'wpcf7',                                // Contact
    'upload.php',                           // Media
    'users.php',                            // Users
    'separator2',                           // Second separator
    'plugins.php',                          // Plugins
    'tools.php',                            // Tools
    'options-general.php',                  // Settings
    'themes.php',                           // Appearance
    'edit-comments.php',                    // Comments
    'admin.php?page=theme-glossary',        // Glossary
  );
}
# init menu order filters
add_filter('custom_menu_order', 'jumpoff_menu_order');  
add_filter('menu_order', 'jumpoff_menu_order');