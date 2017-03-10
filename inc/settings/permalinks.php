<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly
/**
 *  Permalink Settings
 *
 *  Set our permalink structre here, so they can't be f'd up in Admin/Settings.
 *  Structre: blog/year/month-numeric/post-name
 */
function jumpoff_set_permalinks() {
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure( '/blog/%year%/%monthnum%/%postname%/' );
}
# Init permalinks setting
add_action( 'init', 'jumpoff_set_permalinks' );
