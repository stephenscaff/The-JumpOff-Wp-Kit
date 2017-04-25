<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/** 
 *  is_post_type()
 *  Adds is_post_type conditional.
 *  @param: $type (string)
 *  @return: boolean (ture if is specified post_type)
 */
function is_post_type( $type ){
  global $wp_query;
  
  // Test if object to avoid error
  // if( !is_object($type) ) {
  //   return;
  // }
  if($type == get_post_type($wp_query->post->ID)){
    return true;
  } 
  return false;
}