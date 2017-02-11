<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 *  Post Type: Case Studies
 *
 *  Slug :      press-releases
 *  Supports : 'title','thumbnail', 'excerpt', 'editor'
 *
 *  @version    1.0
 *  @author     stephen scaff
 *  @see        single.php
 *  @see        archive.php
 */

function create_case_study_post_types() {
  register_post_type( 'case_studies', 

  array(
    'labels'              => array(
    'name'                => __( 'Case Studies' ),
    'singular_name'       => __( 'Case Study' ),
    'add_new'             => __( 'Add Case Study' ),
    'add_new_item'        => __( 'Add Case Study' ),
    'edit'                => __( 'Edit Case Study' ),
    'edit_item'           => __( 'Edit Case Study' ),
    'new_item'            => __( 'New Case Study' ),
    'view'                => __( 'View This Case Study' ),
    'view_item'           => __( 'View This Case Study ' ),
    'search_items'        => __( 'Search Case Studies' ),
    'not_found'           => __( 'Sorry Buddy. That Case Study cannot be found' ),
    'not_found_in_trash'  => __( 'That Case Study is not in the Trash' ),
  ),

  'description'           => __( 'Case Studies of Projects and success stories.' ),
  'public'                => true,
  'show_ui'               => true,
  'menu_position'         => 6,
  'menu_dashicon'         => 'dashicons-format-aside',
  'menu_icon'             => 'dashicons-format-aside',
  'query_var'             => true,  
  'supports'              => array( 'title','thumbnail', 'editor', 'excerpt' ),
  'capability_type'       => 'post',
  'can_export'            => true,
  'has_archive'           => true,
  'rewrite'               => array('slug' => 'case_studies', 'with_front' => false),
  ));
}

/*--------------------------------------------------*/
/* CPT industries: init
/*--------------------------------------------------*/
add_action('init', 'create_case_study_post_types');


?>
