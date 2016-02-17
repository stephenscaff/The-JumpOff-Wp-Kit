<?php
/*--------------------------------------------------*/
/*  Custom Post Typesa & Taxonomies
/*  An example file of how to register Custom Post Types and Taxonomies
/*  Just copy or rename this file and include from functions.php
/*--------------------------------------------------*/


/*--------------------------------------------------*/
/* Flush Rewrites
/*--------------------------------------------------*/
add_action( 'after_switch_theme', 'jumpoff_flush_rewrite_rules' );

// Flush your rewrite rules
function worldhousing_flush_rewrite_rules() {
 flush_rewrite_rules();
}

/*--------------------------------------------------*/
/* CPT: Team
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
  'menu_position' => 5,
  'menu_dashicon' => 'dashicons-nametag',
  'menu_icon' => 'dashicons-nametag',
  'query_var' => true,
  //'taxonomies' => array( 'category'),
  'supports' => array( 'title','thumbnail', 'excerpt', 'custom-fields', 'editor' ),
  'capability_type' => 'post',
  'can_export' => true,
  'has_archive' => true,
  'rewrite' => array('slug' => 'team', 'with_front' => false),
  )
 );
}

/*--------------------------------------------------*/
/* CPT Team: init
/*--------------------------------------------------*/
add_action('init', 'create_team_post_types');



/*--------------------------------------------------*/
/*  Jobs Taxonomy: Job Type (volunteer or paid)
/*--------------------------------------------------*/
function team_category_taxonomy() {
  register_taxonomy(
  'team-categories',  //The name of the taxonomy.
  'team',             //post type name
  array(  
      'hierarchical' => true,
      'labels' => array(
       'name' => _x('Team Categories', 'taxonomy general name'),
       'singular_name' => _x('Team Category', 'taxonomy singular name'),
       'search_items' => __('Search Team Categories'),
       'all_items' => __('All Team Categories'),
       'edit_item' => __('Edit Team Category'),
       'update_item' => __('Update Team Category'),
       'add_new_item' => __('Add New Team Category'),
       'new_item_name' => __('New Job Type'),
       'menu_name' => __('Team Categories'),
      ),
      'rewrite' => array(
       'slug' => 'team-categories', // This controls the base slug that will display before each term
       'with_front' => false, // Don't display the category base before "/locations/"
       'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
      ),
  ));
}
add_action( 'init', 'team_category_taxonomy');