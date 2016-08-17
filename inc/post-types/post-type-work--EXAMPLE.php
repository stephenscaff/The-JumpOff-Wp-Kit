<?php
/*--------------------------------------------------*/
/*  Custom Post Type: Work
/*--------------------------------------------------*/

function create_Work_post_types() {
  register_post_type( 'work', 

  array(
    'labels' => array(
    'name' => __( 'Work' ),
    'singular_name' => __( 'Work' ),
    'add_new' => __( 'Add New Project' ),
    'add_new_item' => __( 'Add New Project' ),
    'edit' => __( 'Edit Project' ),
    'edit_item' => __( 'Edit Project' ),
    'new_item' => __( 'New Project' ),
    'view' => __( 'View This Project' ),
    'view_item' => __( 'View This Project ' ),
    'search_items' => __( 'Search Projects' ),
    'not_found' => __( 'Sorry Buddy. That Project is not found' ),
    'not_found_in_trash' => __( 'That Project is not in the Trash' ),
  ),

  'description' => __( 'A collection of DNA\'\s projects and client work' ),
  'public' => true,
  'show_ui' => true,
  'menu_position' => 6,
  'menu_dashicon' => 'dashicons-book-alt',
  'menu_icon' => 'dashicons-book-alt',
  'query_var' => true,  
  //'taxonomies' => array( 'category'),
  'supports' => array( 'title','thumbnail', 'excerpt', 'custom-fields', 'editor' ),
  'capability_type' => 'post',
  'can_export' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'work', 'with_front' => false),
  ));
}

/*--------------------------------------------------*/
/* CPT Work: init
/*--------------------------------------------------*/
add_action('init', 'create_work_post_types');




/*--------------------------------------------------*/
/*  Work Filters (taxonomy)
/*--------------------------------------------------*/
function work_filters() {
  register_taxonomy(
  'work-filters',  //The name of the taxonomy.
  'work',             //post type name
  array(  
       'hierarchical' => true,
      'labels' => array(
       'name' => _x('Work Filters', 'taxonomy general name'),
       'singular_name' => _x('Work Filter', 'taxonomy singular name'),
       'search_items' => __('Search Work Filter'),
       'all_items' => __('All Work Filters'),
       'edit_item' => __('Edit Work Filter'),
       'update_item' => __('Update Work Filter'),
       'add_new_item' => __('Add New Work Filter'),
       'new_item_name' => __('New Work Filter'),
       'menu_name' => __('Work Filters'),
      
      ),
      'rewrite' => array(
       'slug' => 'work-filters', // This controls the base slug that will display before each term
       'with_front' => false, // Don't display the category base before "/locations/"

      ),
  ));
}
add_action( 'init', 'work_filters');