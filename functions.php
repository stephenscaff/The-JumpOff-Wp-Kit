<?php

/*--------------------------------------------------*/
/*	Let's run all out inits and whatnot through a single setup.
/* Fucntions broken up in lib/ folder with files noted in comments.
/* lib/ files also contain a few other ready to rock common
/* functions currently commented out.
/*--------------------------------------------------*/ 

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
/*	@cleanup: remove css and js versions. Clean style output
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
/*	Admin: Remove P Custom Options  
/*-----------------------------------------------*/
add_action('admin_menu', 'jumpoff_removep_meta_box_add');
add_action('edit_post', 'jumpoff_removep_post_meta_tags');
add_action('publish_post', 'jumpoff_removep_post_meta_tags');
add_action('save_post', 'jumpoff_removep_post_meta_tags');
add_action('edit_page_form', 'jumpoff_removep_post_meta_tags');
add_filter('the_content', 'jumpoff_removep_wpautop', 9);

/*-----------------------------------------------*/
/*	@admin: Toolbar customization
/*-----------------------------------------------*/
add_filter('quicktags_settings', 'jumpoff_show_quicktags');
add_action( 'admin_print_footer_scripts', 'jumpoff_add_quicktags' );

/*-----------------------------------------------*/
/*	@users: Extra custom fields - contact methods, avatar img
/*-----------------------------------------------*/
add_filter('user_contactmethods', 'jumpoff_contact_information');
add_action( 'show_user_profile', 'jumpoff_avatar_add_profile_field' );
add_action( 'edit_user_profile', 'jumpoff_avatar_add_profile_field' );
add_action( 'personal_options_update', 'jumpoff_save_avatar_profile_field' );
add_action( 'edit_user_profile_update', 'jumpoff_save_avatar_profile_field' );

}
add_action('after_setup_theme', 'jumpoff_setup');


/*-----------------------------------------------*/
/*	Includes: Enqueue
/*-----------------------------------------------*/
require_once('lib/styles-scripts.php');
/*-----------------------------------------------*/
/*	Includes: CleanUp
/*-----------------------------------------------*/
require_once('lib/cleanup.php');
/*-----------------------------------------------*/
/*	Includes: Classes
/*-----------------------------------------------*/
require_once('lib/classes.php');
/*-----------------------------------------------*/
/*	Includes: Admin
/*-----------------------------------------------*/
require_once('lib/admin.php');
/*-----------------------------------------------*/
/*	Includes: Users
/*-----------------------------------------------*/
require_once('lib/users.php');
/*-----------------------------------------------*/
/*	Includes: Posts
/*-----------------------------------------------*/
require_once('lib/posts.php');
/*-----------------------------------------------*/
/*	Includes: Custom Fields
/*-----------------------------------------------*/
require_once('lib/customfields.php');

?>