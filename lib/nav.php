<?php

/*--------------------------------------------------*/
/*	THEME SUPPORT FOR MENUS
/*--------------------------------------------------*/
add_theme_support('menus');
register_nav_menus(array(
	'primary_navigation' => __('Primary Navigation', 'jumpoff'),
	'utility_navigation' => __('Utility Navigation', 'jumpoff')
));	
/*--------------------------------------------------*/
/*	Simple Menu Output
/*--------------------------------------------------*/

// Create a function for register_nav_menus()
function add_wp3menu_support() {
 
register_nav_menus(
        array(
        'main-menu' => __('Main Navigation'),
        'another-menu' => __('Another Navigation')
        )
     );
 
}
 
//Add the above function to init hook.
 
add_action('init', 'add_wp3menu_support');


/*--------------------------------------------------*/
/*	Walker Menu Output and class clean up
/*--------------------------------------------------
class jumpoff_walker extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
  }
}
function custom_wp_nav_menu($var) {
	return is_array($var) ? array_intersect($var, array(
		// List of useful classes to keep
		'current_page_item',
		'transition'
		)
	) : '';}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');
*/

?>