<?php
# Taxonomies and Categories:

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *  Categories List
 *  Returns cats wtih content to output as list
 *
 *  @return string $category_item
 */
function jumpoff_categories_list() {

  // Get Categories
  $categories = get_categories();

  // Cat Item
  $category_item = '';

  // Got Cats?
  if ( $categories ) {  
    
    // Loop through cats
    foreach ( $categories as $category ) {

      // If there was an error, continue to the next term.
      if ( is_wp_error( $categories ) ) {
        continue;
      }
      // Category Link
      $category_link = get_category_link( $category->term_id );

      // Category List Item
      $category_item .= '<li><a href="' . $category_link . '">' . $category->name . '</a></li>';
    }
    return $category_item;
  }
}


/**
 * jumpoff_filter_items
 * Gets all available terms for CPT filtering, via mixitup.js, or building term archive links.
 *
 *  @param  string  $taxonomy   The custom taxonomy
 *  @param  boolean $filtering  True(default) Use mixit filters, false: use term archive link
 *  @see    partials/partial-resources
 *  @see    kit/assets/js/vendor/_mixitup.js
 *  @return string $filter_item
 */
function jumpoff_filter_items($taxonomy, $filtering=TRUE) {

// Get Terms
$terms = get_terms($taxonomy);

// Filter Item to return
$filter_item ='';

  // Got terms?
 if ($terms) {  
    
    // Loop through taxonomy's terms
    foreach ( $terms as $term ) {

      // If there was an error, continue to the next term.
      if ( is_wp_error( $term ) ) {
        continue;
      }

      if( !is_object($term) ) {
        return;
      }

      // Get Term Archive Link
      $term_link = get_term_link( $term );

      // if $filtering is false
      if ( $filtering == FALSE  )  {

        // Build archive links for the terms
        $filter_item .= '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
      
      } else {
        
        // Construct our list item with stuff needed for Mixitup.js
        $filter_item .= '<li class="filter" data-filter=".'.$term->slug . '">' . $term->name . '</li>';
      }
    }
    return $filter_item;
  }
}


/**
 *  Single Post Categorey 
 *  Returns a post's cat (first in cat array)
 *
 *  @see   
 *  @return (string) $single_cat;
 */
function jumpoff_post_cat($type){
  
  global $post;
  
  // Get cats from post id
  $categories = get_the_category($post->ID);

  if ($categories){
    
    $single_cat = '';

    if ($type === 'name'){
      //return $categories[0]->cat_name;
      $single_cat = $categories[0]->cat_name;
    }

    if ($type === 'url'){
      //return esc_url( get_category_link( $categories[0]->term_id ) ) ;
      $single_cat = esc_url( get_category_link( $categories[0]->term_id ) );
    }

    return $single_cat;
  }
} 


/**
 *  jumpoff_post_term
 *  Gets the term of a given post, within a provided taxonomy
 *
 *  @see   
 *  @param string $taxonomy The name of desired taxonomy 
 *  @return object term name
 */
function jumpoff_post_term($taxonomy, $type) {

  global $post;
    
  // get_post_terms with post id and provided taxonomy.
  // @see: https://codex.wordpress.org/Function_Reference/wp_get_post_terms
  $terms = wp_get_post_terms($post->ID, $taxonomy);
  
  foreach ( $terms as $term ) {
    
    // If there was an error, continue to the next term.
    if ( is_wp_error( $term ) ) {
      continue;
    }

    if ($type === 'name'){
      $term = $term->name;
    }
    elseif ($type === 'url'){
      $term = esc_url( get_term_link($term) );
    }
  }
  return $term;
}
