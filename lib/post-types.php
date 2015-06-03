<?php
/*--------------------------------------------------*/
/*	Flush Rewrites
/*--------------------------------------------------*/
add_action( 'after_switch_theme', 'jumpoff_flush_rewrite_rules' );

// Flush your rewrite rules
function jumpoff_flush_rewrite_rules() {
	flush_rewrite_rules();
}

/*--------------------------------------------------*/
/*	CPT Example
/*--------------------------------------------------*/

add_action('init', 'create_team_post_types');
function create_team_post_types() {
register_post_type(
'team',
array(
'labels' => array(
'name' => __( 'Team' ),
'singular_name' => __( 'team' ),
'add_new' => __( 'Add New Team Member' ),
'add_new_item' => __( 'Add New Team Member' ),
'edit' => __( 'Edit' ),
'edit_item' => __( 'Edit Team Member' ),
'new_item' => __( 'New Team Member' ),
'view' => __( 'View Team Member' ),
'view_item' => __( 'View Team Member Page' ),
'search_items' => __( 'Search Team Members' ),
'not_found' => __( 'No such team member found' ),
'not_found_in_trash' => __( 'No team members found in the Trash' ),
),
'public' => true,
'show_ui' => true,
'menu_position' => 5,
'menu_dashicon' => 'dashicons-id',
'menu_icon' => 'dashicons-id',
'query_var' => true,
//'taxonomies' => array('category', 'post_tag'),
'supports' => array( 'title','thumbnail', 'excerpt', 'custom-fields', 'editor' ),
'rewrite' => array( 'slug' => 'team', 'with_front' => false ),
'capability_type' => 'post',
'can_export' => true
)
);

}

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
if ( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
$post_type = get_query_var('post_type');
if($post_type)
    $post_type = $post_type;
else
    $post_type = array('post','team','nav_menu_item'); // replace cpt to your custom post type
$query->set('post_type',$post_type);
return $query;
}
}
?>