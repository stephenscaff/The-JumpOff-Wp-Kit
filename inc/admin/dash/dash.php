<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *  Post Type: Clients
 *
 *  Slug : press-releases
 *  Supports : title','thumbnail', 'editor', 'excerpt'
 *
 *  @version    1.0
 *  @see        single-press-releases
 *  @see        archive-press-releases
 */

class CustomDash {
 
  /**
   * Constructor
   */
  function __construct() {
    add_action('admin_menu', array( $this,'register_menu') );
    add_action('load-index.php', array( $this,'redirect_dash') );
  } 
 
  function redirect_dash() {
  
    if( is_admin() ) {
      $screen = get_current_screen();
      
      if( $screen->base == 'dashboard' ) {
        wp_redirect( admin_url( 'index.php?page=welcome' ) );
      }
    }
  }
  
  function register_menu() {
    add_dashboard_page( 'Welcome', 'Welcome', 'read', 'welcome', array( $this,'dash_view') );
  }
  
  function dash_view() {
    require_once('dash-view.php');;
  } 
}

new CustomDash;
 