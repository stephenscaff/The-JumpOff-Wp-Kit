<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 * Admin Elements
 * Adds or edits admin elements, ie; the admin bar, admin footer, etc.
 */
class AdminBar{
  
  function __construct(){
    add_action( 'wp_before_admin_bar_render', array( $this, 'admin_bar'));
    $this->no_front_adminbar();
  }

  /**
   * Backend Admin Bar Cleanup
   */
  function admin_bar(){
    global $wp_admin_bar;

    // Remove Menu Items
    $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
    $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
    $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
    $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
    $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
    //$wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
    $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
    $wp_admin_bar->remove_menu('updates');          // Remove the updates link
    $wp_admin_bar->remove_menu('comments');         // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      // Remove the content link
  }

  /**
   * Remove Front End Admin Bar
   */
  function no_front_adminbar(){
    add_filter('show_admin_bar', '__return_false'); 
  }
}

new AdminBar;
