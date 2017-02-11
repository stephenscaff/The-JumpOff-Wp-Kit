<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( function_exists('acf_add_options_page') ) {

  /**
   *  Create 'Globals' Menu Item 
   *  for global fields, with subpages
   */
  function jumpoff_global_options(){
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      // Page Title  
      'page_title'  => 'Globals',
      // Menu Title
      'menu_title'  => 'Globals',
      // Slug
      'menu_slug'   => 'globals',
      // Set Icon
      'icon_url'    => 'dashicons-admin-site',
      // If we want to limit editing per user type
      'capability'  => '',
      // 'false' creates page instead of redirecting to the first child.
      'redirect'    => false,
      //'position'    => 8
    ));

  /**
   *  'Globals' Subpage: Promo Section'
   *  Duplicate 'acf_add_options_sub_page' for additional subpages.
   */
    acf_add_options_sub_page(array(
      // Page Title  
      'page_title'  => 'Menu',
      // Menu item title
      'menu_title'  => 'Menu',
      // Slug
      'parent_slug' => 'globals',
      ));
    }
  }

  // Init
  add_action('init', 'jumpoff_global_options');
}
?>