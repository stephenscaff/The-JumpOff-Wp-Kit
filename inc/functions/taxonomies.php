<?php
/*-----------------------------------------------*/
/* Taxonomies and Categories:
/* Funcitons and helpers related to working with or retrieving cats and taxes.
/*-----------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



/**
 * jumpoff_filter_items
 * Gets all available terms for CPT filtering, via mixitup.js, or building term archive links.
 *
 *  @param  $taxonomy (string) = the custom taxonomy
 *  @param  $filtering (boolean) - true(default): use mixit filters, false: use term archive link
 *  @see    partials/partial-resources
 *  @see    kit/assets/js/vendor/_mixitup.js
 *  @return string $filter_item
 */
function jumpoff_filter_items($taxonomy, $filtering=' TRUE ') {

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
 * jumpoff_tax_list()
 * Echos taxonomy list for subnavs
 *
 *  @see    
 *  @return string 
 */
function jumpoff_tax_nav($taxonomy) {

// Get terms from passed taxonomy
$terms = get_terms($taxonomy);

// Set up a counter
$counter = 1;

// nav_item to return
$list_item='';

// If we have terms
if ($terms) {

  // Loop through terms
  foreach ( $terms as $term ) {

    // If there was an error, continue to the next term.
    if ( is_wp_error( $term ) ) {
      continue;
    }
    // Build our nav list item
    $list_item .= '<li><a class="no-trans" data-scroll-nav="' . $counter . '" href="#">' . $term->name . '</a></li>';
      
    $counter++;
    }
     return $list_item;
      
      
  }
}


/*-----------------------------------------------*/
/*  jumpoff_get_cats()
/*  Get a list of the posts cats
/*  @example:     jumpoff_get_cats()
/*-----------------------------------------------*/
function jumpoff_cat_list() {
  $args = array(
    'orderby' => 'name',
    'parent' => 0
  );
  $categories = get_categories( $args );
  if ( $categories ) {
    foreach ( $categories as $category ) {
     echo( '<ul><li><a class="post-cats__cat" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li></ul>');
    }
  }
}

/**
 *  jumpoff_term_link()
 *  Gets the term archive link, used with View All links
 *
 *  @see    index.php
 *  @param  $term (string)  
 *  @param  $tax (string)  
 *  @return $term_link (string) the term archive link
 */
function jumpoff_term_link($term, $tax){

  // @see https://developer.wordpress.org/reference/functions/get_term_link/
  $term_link = get_term_link( $term, $tax );

  return $term_link;
}


/**
 *  jumpoff_cats_unlinked
 *  Outputs unlinked categories, for use with js filters via mixitup.js. 
 *  Optional sep.
 *
 *  @see    kit/assets/js/vendor/_mixitup.js
 *  @param  string $taxonomy The name of desired taxonomy 
 *  @return object term name
 */
function jumpoff_cats_unlinked($separator = ' ') {
  $categories = (array) get_the_category();
  $thelist = '';

  foreach($categories as $category) {   
    $thelist .= $separator . $category->category_nicename;
  }                                                                                                                                                       
  return $thelist;
}

/**
 *  jumpoff_tax_unlinked
 *  Outputs unlinked taxonomies, for use with js filters via mixitup.js
 *
 *  @see    kit/assets/js/vendor/_mixitup.js
 *  @param  string $taxonomy The name of desired taxonomy 
 *  @return object term name
 */
function jumpoff_tax_unlinked($taxonomy) {
  // import global post object
  global $post;

  // get_post_terms with post id and provided taxonomy.
  // @see: https://codex.wordpress.org/Function_Reference/wp_get_post_terms
  $terms = wp_get_post_terms($post->ID, $taxonomy);
  
  foreach ( $terms as $term ) {
    return $term->slug . ' ';
  }
}


/**
 *  jumpoff_term_name
 *  Gets the term of a given post, within a provided taxonomy
 *
 *  @see   
 *  @param string $taxonomy The name of desired taxonomy 
 *  @return object term name
 */
function jumpoff_term_name($taxonomy) {
  // import global post object
  global $post;
  
  
  // get_post_terms with post id and provided taxonomy.
  // @see: https://codex.wordpress.org/Function_Reference/wp_get_post_terms
  $terms = wp_get_post_terms($post->ID, $taxonomy);
  
  foreach ( $terms as $term ) {
    
    // If there was an error, continue to the next term.
    if ( is_wp_error( $term ) ) {
        continue;
    }
    return $term->name;
  }
}

/**
 *  jumpoff_term_archive_url
 *  Gets the terms archive url
 *
 *  @see    
 *  @return url / WP_Error
 */
function jumpoff_term_url($taxonomy) {
  // import global post object
  global $post;

  // get_post_terms with post id and provided taxonomy.
  // @see: https://codex.wordpress.org/Function_Reference/wp_get_post_terms
  $terms = wp_get_post_terms($post->ID, $taxonomy);

  foreach ( $terms as $term ) {
    // If there was an error, continue to the next term.
    if ( is_wp_error( $term ) ) {
      continue;
    }
    return get_term_link($term);
  }
}

/**
 *  jumpoff_get_term_archive_url
 *  Gets the terms archive url
 *
 *  @see    
 *  @return string 
 */
function jumpoff_get_term_archive_url($taxonomy){
  $tax = get_term_link($taxonomy);
  return get_bloginfo('url').'/'.$tax->rewrite['slug'];
}


/**
 *  Get Single Cat from slug
 *  Gets the term of a given post, within a provided taxonomy
 *
 *  @see   
 *  @return $categories (post_name);
 */
function jumpoff_get_cat_slug(){
  global $post;
  $categories = get_the_category($post->ID);
  return $categories[0]->slug;
} 


/**
 *  jumpoff_get_cat_archive()
 *  Builds category archive links by passing in the Cat Name
 *
 *  @see    
 *  @return string $cat_url
 */
function jumpoff_get_cat_archive($cat_name){
  global $post;
  // Get the ID of a given category
  $category_id = get_cat_ID($cat_name);

  // Get the URL of this category
  $category_link = get_category_link( $category_id  );
  $cat_url = '<a href="'. $category_link .'" title="'.$cat_name.'">'.$catn_ame.'</a>';
  return $cat_url;
}

?>