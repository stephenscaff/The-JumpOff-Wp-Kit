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
	add_filter('style_loader_src', 'remove_cssjs_ver', 1000 );
	add_filter('script_loader_src', 'remove_cssjs_ver', 1000 );
	add_filter('style_loader_tag', 'jumpoff_clean_style_tag');
	
	/*--------------------------------------------------*/
	/*	@cleanup: Security - remove wp version
	/*--------------------------------------------------*/ 
	add_filter('the_generator', 'remove_wp_version');
	add_filter('the_generator', '__return_false');

/*--------------------------------------------------*/
/*	@classes: Body Classes
/*--------------------------------------------------*/ 
	add_filter('body_class', 'jumpoff_body_class');

/*--------------------------------------------------*/
/*	@posts: Remove P, Excerpts
/*--------------------------------------------------*/
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	add_filter('excerpt_more', 'new_excerpt_more');
	//add_filter('the_content', 'removeEmptyParagraphs',99999);
	

	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	//add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus

}
add_action('after_setup_theme', 'jumpoff_setup');
require_once('lib/admin.php');
require_once('lib/cleanup.php');
require_once('lib/styles-scripts.php');
require_once('lib/posts.php');
require_once('lib/admin.php');
require_once('lib/classes.php');



?>