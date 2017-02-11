<?php
/**
 * Scripts and Styles Loader
 */
function jumpoff_scripts_and_styles() {
	if ( !is_admin() ) {
	
		//Register Styles
		wp_register_style( 'jumpoff_styles',get_template_directory_uri() . '/assets/css/app.min.css', false );
		wp_register_style( 'jumpoff_fonts',get_template_directory_uri() . '/assets/css/fonts.min.css', false );
		
		//	Jquery (footer)
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', '', false, true );

		// App (footer)
		wp_register_script( 'jumpoff_js', get_template_directory_uri() . '/assets/js/app.min.js', array( 'jquery' ), false, true );
		
		//Enqueue Order
		wp_enqueue_style( 'jumpoff_styles' );
		wp_enqueue_style( 'jumpoff_fonts' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jumpoff_js' );
	}
}
add_action( 'wp_enqueue_scripts', 'jumpoff_scripts_and_styles' );

/**
 * Asynch Loader for js
 */
function jumpoff_async_js($tag, $handle) {
  if ( 'jumpoff_js' !== $handle )
  	return $tag;
  if ( 'jquery' !== $handle )
  	return str_replace( ' src', ' async="async" src', $tag );
}
add_filter('script_loader_tag', 'jumpoff_async_js', 10, 2);

/**
 * 	Admin and Login
 *	Loads styles for custom admin theme and login page
 */
function jumpoff_admin_theme_styles() {
  wp_enqueue_style('admin',get_template_directory_uri() . '/inc/admin/admin-theme/admin.css', false );
}
add_action('admin_enqueue_scripts', 'jumpoff_admin_theme_styles');
add_action('login_enqueue_scripts', 'jumpoff_admin_theme_styles');


/**
 * Removes cf7 scripts / styles for all but contact page
 */
function jumpoff_cf7_dequeue() {
	if ( !is_page( array( 'contact' ) ) ) {
		wp_dequeue_script( 'contact-form-7' );
		wp_dequeue_style( 'contact-form-7' );
	}
}
add_action( 'wp_enqueue_scripts', 'jumpoff_cf7_dequeue', 99 ); 

?>