<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 * Admin Theme 
 * Loads assets and provides methods for customizing the wp admin,
 */
class AdminStylesScripts {
  
  function __construct(){
    add_action('admin_enqueue_scripts', array( $this, 'load_styles') );
    add_action('login_enqueue_scripts', array ( $this, 'load_styles') );
    add_filter( 'admin_body_class', array( $this, 'admin_body_class' ) );
  }

  function load_styles(){
    wp_enqueue_style('admin', get_template_directory_uri() . '/inc/admin/admin-theme/assets/css/admin.min.css', false );
  }

  /**
   *  Body Class for admin
   *  Adding a body class allows us to target 
   *  and style desired elements
   */
  function admin_body_class(){

    global $post;

    if( !is_object($post) ) {
      return;
    }

    setup_postdata( $post );

    // Returns an object that includes the screen’s ID, base, post type, taxonomy
    // @see https://developer.wordpress.org/reference/functions/get_current_screen
    $screen = get_current_screen();

    // Construct class from post id
    $post_id = 'admin-post-'.$post->ID;

    // Page Name
    $page_name = 'admin-'.$post->post_name;
    $classes;
    $classes = ' ' . $screen->post_type . ' ' . $post_id . ' ' . $page_name . '';

    // Had issues returning page template name, so...
    if(basename(get_page_template()) === 'page.php'){
      $classes .= ' admin-page-template-default';
    }

    return $classes;
    wp_reset_postdata( $post );
  }
}

new AdminStylesScripts;