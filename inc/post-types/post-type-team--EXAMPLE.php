<?php
/*--------------------------------------------------*/
/*  Custom Post Type: Team
/*--------------------------------------------------*/

function create_team_post_types() {
  register_post_type( 'team', 

  array(
    'labels' => array(
    'name' => __( 'Team' ),
    'singular_name' => __( 'Team Member' ),
    'add_new' => __( 'Add New Team Member' ),
    'add_new_item' => __( 'Add New Team Member' ),
    'edit' => __( 'Edit Team Member' ),
    'edit_item' => __( 'Edit Team Member' ),
    'new_item' => __( 'New Team Member' ),
    'view' => __( 'View This Team Member' ),
    'view_item' => __( 'View This Team Member' ),
    'search_items' => __( 'Search Team Member' ),
    'not_found' => __( 'Sorry Buddy. That Team Member is not found' ),
    'not_found_in_trash' => __( 'That Team Member is not in the Trash' ),
  ),

  'description' => __( 'The Team' ),
  'public' => true,
  'show_ui' => true,
  'menu_position' => 6,
  'menu_dashicon' => 'dashicons-nametag',
  'menu_icon' => 'dashicons-nametag',
  'query_var' => true,  
  //'taxonomies' => array( 'category'),
  'supports' => array( 'title','thumbnail', 'excerpt', 'custom-fields', 'editor' ),
  'capability_type' => 'post',
  'can_export' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'about', 'with_front' => false),
  ));
}

/*--------------------------------------------------*/
/* CPT Team: init
/*--------------------------------------------------*/
add_action('init', 'create_team_post_types');

