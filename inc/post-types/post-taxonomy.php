<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *  Taxonomy: Post Functions (posts)
 *
 *  Creates 'post-functions' custom taxonomy, for stuff like Featured Posts
 *
 *  Slug : na
 *  hierarchical : false
 *  
 *  @author     Stephen Scaff
 *  @version    1.0
 */
function post_functions_taxonomy() {
  register_taxonomy(
    'post-functions',  //The name of the taxonomy.
    array( 'post', 'industries', 'products' ),

    array(  
    'labels'              => array(
    'name'                => _x('Post Functions', 'taxonomy general name'),
    'singular_name'       => _x('Post Function', 'taxonomy singular name'),
    'search_items'        => __('Search Post Functions'),
    'all_items'           => __('All Post Functions'),
    'edit_item'           => __('Edit Post Functions'),
    'update_item'         => __('Update Post Function'),
    'add_new_item'        => __('Add New Post Function'),
    'new_item_name'       => __('New Post Function'),
    'menu_name'           => __('Post Functions'),
    'show_admin_column'   => true,
    'show_ui'             => true,
    ),
    'hierarchical'        => true,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'show_in_quick_edit'  => true,
    'rewrite'             => array(
      'with_front'        => false,
    ),
  ));
}
add_action( 'init', 'post_functions_taxonomy');

?>