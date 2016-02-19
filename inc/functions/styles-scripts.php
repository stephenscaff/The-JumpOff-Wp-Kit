<?php
/*-------------------------------------------*/
/*	SCripts and Styles: Register and enqueue
/*-------------------------------------------*/
function jumpoff_scripts_and_styles() {
	if ( !is_admin() ) {
	
		//Register Styles
		wp_register_style( 'jumpoff_styles',get_template_directory_uri() . '/assets/css/app.min.css', false );
		wp_register_style( 'jumpoff_fonts',get_template_directory_uri() . '/assets/css/fonts.min.css', false );
		
		//Register scripts for head
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js' );
		//wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array( 'jquery' ));
		
		//scripts for footer
		wp_register_script( 'jumpoff_plugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'jumpoff_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jumpoff_plugins' ), false, true );
	
		//Enqueue Order
		wp_enqueue_style( 'jumpoff_styles' );
		wp_enqueue_style( 'jumpoff_fonts' );
		
		wp_enqueue_script( 'jquery' );
		//wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'jumpoff_plugins' );
		wp_enqueue_script( 'jumpoff_scripts' );
		
		//Threaded Comments
		if( get_option( 'thread_comments' ) )  { wp_enqueue_script( 'comment-reply' ); }
		if ( is_front_page() ) {}
	}
}
add_action( 'wp_enqueue_scripts', 'jumpoff_scripts_and_styles' );

/*-------------------------------------------*/
/*	Admin Styles
/*-------------------------------------------*/
function jumpoff_admin_login_styles() {
  wp_enqueue_style('admin-styles',get_template_directory_uri() . '/inc/admin-styles/admin-styles.css', false );
}
/*-------------------------------------------*/
/*	Actions
/*-------------------------------------------*/
add_action('admin_enqueue_scripts', 'jumpoff_admin_login_styles');
add_action('login_enqueue_scripts', 'jumpoff_admin_login_styles');

?>