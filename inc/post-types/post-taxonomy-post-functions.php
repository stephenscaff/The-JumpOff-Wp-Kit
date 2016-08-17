<?php
/*--------------------------------------------------*/
/*  Taxonomy: Post Functions (posts)
/*  
/*  A "Post Functions" taxonomy
/*  Instead of cluttering up categories, use Post Function for stuff like
/*  "Featured Posts" and so on.
/*--------------------------------------------------*/
function post_functions_taxonomy() {
  register_taxonomy(
  'post-functions',  //The name of the taxonomy.
  'post',

    array(  
    'hierarchical' => true,
    'labels' => array(
    'name' => _x('Post Functions', 'taxonomy general name'),
    'singular_name' => _x('Post Function', 'taxonomy singular name'),
    'search_items' => __('Search Post Functions'),
    'all_items' => __('All Post Functions'),
    'edit_item' => __('Edit Post Functions'),
    'update_item' => __('Update Post Function'),
    'add_new_item' => __('Add New Post Function'),
    'new_item_name' => __('New Post Function'),
    'menu_name' => __('Post Functions'),
    'show_admin_column' => true,
    'show_ui' => true,
    ),
    'rewrite' => array(
      'with_front'=> false,
      'feed'=> false,
      'pages'=> false,
      'hierarchical' => false 
    ),
  ));
}
add_action( 'init', 'post_functions_taxonomy');


?>