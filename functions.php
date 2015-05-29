<?php
function jumpoff_setup() {

/*--------------------------------------------------*/
/*	@Cleanup: head cleanup
/*--------------------------------------------------*/ 
add_action('init', 'jumpoff_head_cleanup');
add_filter('language_attributes', 'jumpoff_language_attributes');

/*--------------------------------------------------*/
/*	@style: scripts: enqueue & load scripts & styles
/*--------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'jumpoff_scripts_and_styles' );

/*--------------------------------------------------*/
/*	@cleanup.php: remove css and js versions. Clean style output
/*--------------------------------------------------*/ 
add_filter('style_loader_src', 'jumpoff_remove_cssjs_ver', 1000 );
add_filter('script_loader_src', 'jumpoff_remove_cssjs_ver', 1000 );
add_filter('style_loader_tag', 'jumpoff_clean_style_tag');

/*--------------------------------------------------*/
/*	@cleanup.php: Security - remove wp version
/*--------------------------------------------------*/ 
add_filter('the_generator', 'jumpoff_remove_wp_version');
add_filter('the_generator', '__return_false');

/*--------------------------------------------------*/
/*	@classes: Body Classes
/*--------------------------------------------------*/ 
add_filter('body_class', 'jumpoff_body_class');

/*--------------------------------------------------*/
/*	@posts: Remove img widths
/*--------------------------------------------------*/ 
add_filter( 'post_thumbnail_html', 'jumpoff_remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'jumpoff_remove_width_attribute', 10 );

/*--------------------------------------------------*/
/*	@posts: Excerpts
/*--------------------------------------------------*/
add_filter( 'excerpt_length', 'jumpoff_custom_excerpt_length', 999 );
add_filter('excerpt_more', 'jumpoff_new_excerpt_more');
//add_filter('the_content', 'removeEmptyParagraphs',99999);

/*--------------------------------------------------*/
/*	@posts: Unauto p
/*--------------------------------------------------*/
add_filter( 'the_content', 'jumpoff_img_unautop', 10 );

/*-----------------------------------------------*/
/*	Remove P Custom Options  
/*-----------------------------------------------*/
add_action('admin_menu', 'jumpoff_removep_meta_box_add');
add_action('edit_post', 'jumpoff_removep_post_meta_tags');
add_action('publish_post', 'jumpoff_removep_post_meta_tags');
add_action('save_post', 'jumpoff_removep_post_meta_tags');
add_action('edit_page_form', 'jumpoff_removep_post_meta_tags');
add_filter('the_content', 'jumpoff_removep_wpautop', 9);

/*-----------------------------------------------*/
/*	@admin - Toolbar customization
/*-----------------------------------------------*/
add_filter('quicktags_settings', 'jumpoff_show_quicktags');
add_action( 'admin_print_footer_scripts', 'jumpoff_add_quicktags' );


}
add_action('after_setup_theme', 'jumpoff_setup');

require_once('lib/admin.php');
require_once('lib/cleanup.php');
require_once('lib/styles-scripts.php');
require_once('lib/posts.php');
require_once('lib/classes.php');



?>