<?php
/**
 * CPT ACF
 *
 * Adds a Menu Item for custom post types to add options page fields.
 *
 * @author    Stephen Scaff
 * @package   SandP
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

function ctp_acf_options_pages() {

  if( function_exists('acf_add_options_page') ) { //Check if installed acf

      $ctpacf_post_types = get_post_types( array(
          '_builtin' => false,
          'has_archive' => true
      ) ); //get post types

      foreach ( $ctpacf_post_types as $cpt ) {

        if( post_type_exists( $cpt ) ) {

          $cptname = get_post_type_object( $cpt )->labels->name;

          $cpt_acf_page = array(
              'page_title' => ucfirst( $cptname ) . ' Index',
              'menu_title' => ucfirst( $cptname ) . ' Index',
              'menu_slug' => 'cpt-acf-' . $cpt,
              'capability' => 'edit_posts',
              'position' => false,
              'parent_slug' => 'edit.php?post_type=' . $cpt,
              'icon_url' => false,
              'redirect' => false,
              'post_id' => 'cpt_' . $cpt,
              'autoload' => false
          );

          acf_add_options_page( $cpt_acf_page );

      } // end if
    }
  } else { //activation warning
    add_action( 'admin_notices', 'ctpacf_admin_error_notice' );
  }
}

add_action( 'init', 'ctp_acf_options_pages', 99 );


  
if ( function_exists( 'acf_add_options_sub_page' ) ){
  acf_add_options_sub_page(array(
    'title'      => 'Blog Index',
    'parent'     => 'edit.php',
    'capability' => 'manage_options'
  ));
}