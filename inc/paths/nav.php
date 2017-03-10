<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 *   Nav Active Class.
 *   Adds active class, since we're not using native wp menus
 *
 *   @param    string $page_name
 *   @return   string 'is-active';
 */
function jumpoff_active_class($page_name){
  if (is_page( $page_name ) || is_post_type_archive($page_name)) {
    return 'is-active';
  }
}

/**
 *   Gets page link.
 *   For use with our custom navigations
 *
 *   @param    string $page_name
 *   @return   string 'is-active';
 */
function jumpoff_page_url($page_name, $cpt=''){
  if ($cpt == true) {
    $page_url = esc_url( get_post_type_archive_link($page_name) );
  } else {
    $page_url = esc_url( get_permalink( get_page_by_title( $page_name ) ) );
  }
  return $page_url;
}
