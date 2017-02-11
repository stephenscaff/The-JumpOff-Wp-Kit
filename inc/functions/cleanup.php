<?php

if ( ! defined( 'ABSPATH' ) ) exit; 

/** 
*  Head Clean Up
*  Cleans up the head with stuff don't need
*  @return: string $classes
*/
function jumpoff_head_cleanup() {

  //Remove rss links
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'rsd_link');

  // Remove xml manifest
  remove_action('wp_head', 'wlwmanifest_link');
  //remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
  
  // Remove Stupid Emoticons
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );

  // Remove Wp Version
  add_filter('the_generator', 'jumpoff_remove_wp_version');

}
add_action('init', 'jumpoff_head_cleanup');


/** 
*  Remove Versioning for security
*/
function jumpoff_remove_wp_version() {
  return '';
}

/** 
*  Stop gallery styles injection
*/
function jumpoff_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}