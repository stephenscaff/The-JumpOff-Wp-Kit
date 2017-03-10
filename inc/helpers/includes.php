<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/** 
 *   jumpoff_slug()
 *   Get category by page slug. Used for passing as var in `get_posts args
 *   @return: jumpoff_slug
 *   @example:
 *
 *  if ( is_home() ) {
 *   $slug = null;
 *  // else if is cat page  
 *  } else {
 *    $slug = jumpoff_slug();
 *  }  
 */
function jumpoff_slug() {
  global $post;
  $slug = get_post( $post )->post_name;
  return $slug;
}

/** 
 *  jumpoff_ids()
 *  Retrieves IDs to use in calling fields.
 *  @return: $id (the id of the post)
 *  @example: $postidd = jumpoff_ids();
 */
function jumpoff_ids() {
  global $post;
  $page_for_posts = get_option( 'page_for_posts' );
  $id;
  if( !is_object( $post ) ) 
     return;
  if (is_post_type_archive()){
    $post_type = get_queried_object();
    $cpt = $post_type->rewrite['slug'];
    $id = "cpt_$cpt";
  } elseif (is_home()){
    $id = 'options'; 
  } elseif (is_front_page()) {
    $id = get_option('page_on_front');
  } else{
    $id = $post->ID;
  }
  return $id;
}

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


/** 
 *  jumpoff_breaks_list ()
 *  Wraps line breaks from as custom fieldin list items
 *  @param: 
 *  @example: jumpoff_breaks_list($fieldname)
 */
function jumpoff_breaks_list ( $textarea ){
  $lines = explode("\n", $textarea);
  if ( !empty($lines) ) {
    echo '<ul class="list-disc">';
    foreach ( $lines as $line ) {
      echo '<li>'. trim( $line ) .'</li>';
    }
  echo '</ul>';
  }
}

/** 
 *  Gets Values from a Query String
 *  @return $key
 */
function get_query_value( $key ) {
  if ( !isset( $_GET[$key] ) ) {
    return false;
  }
  return $_GET[$key];
}


/*
if(strlen($title) > 24)
    {
        $title = substr($title, 0, 20) . "....";
    }
*/