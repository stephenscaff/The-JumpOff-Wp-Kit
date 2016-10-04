<?php
/*-------------------------------------------*/
/*	Styles and Scripts Loading
/*-------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 * jumpoff_scripts_and_styles
 * Register and enqueue our scripts and styles loading
 *
 * @see 
 */
function jumpoff_scripts_and_styles() {
	if ( !is_admin() ) {
	
		//Register Styles
		wp_register_style( 'jumpoff_styles',get_template_directory_uri() . '/assets/css/app.min.css', false );
		wp_register_style( 'jumpoff_fonts',get_template_directory_uri() . '/assets/css/fonts.min.css', false );
		
		//Register scripts for head
		//wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array( 'jquery' ));
		
		//scripts for footer
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', '', false, true );
		wp_register_script( 'jumpoff_js', get_template_directory_uri() . '/assets/js/app.min.js', array( 'jquery' ), false, true );
		//wp_register_script( 'posts_js', get_template_directory_uri() . '/assets/js/posts.min.js', array( 'jquery' ), false, true );
		
		//Enqueue Order
		wp_enqueue_style( 'jumpoff_styles' );
		wp_enqueue_style( 'jumpoff_fonts' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jumpoff_js' );
		// Load only on Posts
		// if ( is_single() ) {
		// 	wp_enqueue_script( 'posts_js' );
		// }
	}
}
add_action( 'wp_enqueue_scripts', 'jumpoff_scripts_and_styles' );



/**
 * 	Asynch JS Loader
 *	Adds aynch to admin.min.js
 *
 *	@param $tag
 * 	@see https://developer.wordpress.org/reference/hooks/script_loader_tag/
 */
function jumpoff_async_js($tag, $handle) {
  if ( 'jumpoff_js' !== $handle )
  	return $tag;
  if ( 'jquery' !== $handle )
  	return str_replace( ' src', ' async="async" src', $tag );
}
add_filter('script_loader_tag', 'jumpoff_async_js', 10, 2);


/**
 * 	jumpoff_remove_css_js_version
 *	Removes the appended versions to our css/js includes
 *
 *	@param $src () the src of our css.js
 *	@return $src 
 */
function jumpoff_remove_css_js_version( $src ) {
  if( strpos( $src, '?ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}

add_filter('style_loader_src', 'jumpoff_remove_css_js_version', 1000 );
add_filter('script_loader_src', 'jumpoff_remove_css_js_version', 1000 );


/**
 * 	Admin and Login Styles
 *	Loads styles for custom admin theme and login page
 *
 *	@param inc/admin/
 *	@return $src 
 */
function jumpoff_admin_theme_styles() {
  wp_enqueue_style('admin',get_template_directory_uri() . '/inc/admin-theme/admin.css', false );
  wp_enqueue_style( 'icons',get_template_directory_uri() . '/assets/css/fonts.min.css', false );
}

add_action('admin_enqueue_scripts', 'jumpoff_admin_theme_styles');
add_action('login_enqueue_scripts', 'jumpoff_admin_theme_styles');

/**
 * 	CF7: jumpoff_cf7_dequeue() 
 *	Removes CF7 scripts and styles for all but the contact page
 *
 */
function jumpoff_cf7_dequeue() {
	if ( !is_page( array( 'contact' ) ) ) {
		wp_dequeue_script( 'contact-form-7' );
		wp_dequeue_style( 'contact-form-7' );
	}
}
add_action( 'wp_enqueue_scripts', 'jumpoff_cf7_dequeue', 99 ); 

?>