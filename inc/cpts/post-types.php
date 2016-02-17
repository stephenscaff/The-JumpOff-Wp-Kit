<?php
/*--------------------------------------------------*/
/*  Cusotm Post Types and Custom Taxonomies 
/*  01. Flush Rewrites
/*  02: Taxonomy - Post Functions
/*--------------------------------------------------*/


/*--------------------------------------------------*/
/* Flush Rewrites
/*--------------------------------------------------*/
add_action( 'after_switch_theme', 'jumpoff_flush_rewrite_rules' );

// Flush your rewrite rules
function jumpoff_flush_rewrite_rules() {
 flush_rewrite_rules();
}

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
        ),
        'rewrite' => array(
        'show_ui' => true,
        'show_admin_column' => true,
            'with_front' => false, 
            'hierarchical' => false 
        ),
    ));


}
add_action( 'init', 'post_functions_taxonomy');


?>