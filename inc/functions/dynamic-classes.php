<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/** 
 *  jumpoff_body_class
 *  Cleans up body classes, then adds custom, based on page or cpt names
 *  @return: $classes (string)
 */
function jumpoff_body_class($classes) {
  global $post, $page;

  if (is_single() || is_page() && !is_front_page()) {
    $classes[] = basename(get_permalink());
  }
  if (is_home() || is_singular('post') || is_post_type_archive( 'post' )) {
    $classes[] = 'blog';
  }
  //Example for CPTs
  if (is_singular('work') || is_post_type_archive( 'work' )) {
    $classes[] = 'work';
  }

  // Remove Classes
  $home_id_class = 'page-id-' . get_option('page_on_front');
  $page_id_class = 'page-id-' . get_the_ID();
  $post_id_class = 'postid-' . get_the_ID();
  $page_template_name_class = 'page-template-page-' . basename(get_permalink());
  $page_template_name_php = 'page-template-page-' . basename(get_permalink()) . '-php';
 
  // Remove Classes Array
  $remove_classes = array(
    'page-template-default', 
    'page-template', 
    'single-format-standard',
    $home_id_class,
    $page_id_class,
    $post_id_class,
    $page_template_name_class,
    $page_template_name_php
  );

  // Add specific classes
  $classes[] = 'page-is-loading';
  $classes = array_diff($classes, $remove_classes);
  return $classes;
}

add_filter('body_class', 'jumpoff_body_class');


/** 
*  jumpoff_mast_class
*  Adds BEM modifier classes to mast partials.
*  @return: $class (string)
*/
function jumpoff_mast_class() {
  $page_for_posts = get_option( 'page_for_posts' );
  $class='';
  if (is_home()){
    $class ='blog';
  } elseif (is_front_page()) {  
    $class ='home';
  } elseif (is_post_type('resources')){
    $class = 'resources';
  } elseif (is_archive()){
    $class = 'archive';
  } else {
    $class = basename(get_permalink());
  }
  return $class;
}
