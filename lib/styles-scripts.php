<?php

/*-------------------------------------------*/
/*	Register and enqueue scripts and styles
/*-------------------------------------------*/
function jumpoff_scripts_and_styles() {
	if ( !is_admin() ) {
	
		//Register Styles
		wp_register_style( 'jumpoff_styles',get_template_directory_uri() . '/assets/css/app.min.css', false );
		wp_register_style( 'jumpoff_fonts',get_template_directory_uri() . '/assets/css/fonts.min.css', false );
		
		//Register scripts for head
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js' );
		wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', array( 'jquery' ));
		
		//scripts for footer
		wp_register_script( 'jumpoff_plugins', get_template_directory_uri() . '/assets/js/plugins.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'jumpoff_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jumpoff_plugins' ), false, true );
	
		//Enqueue Order
		wp_enqueue_style( 'jumpoff_styles' );
		wp_enqueue_style( 'jumpoff_fonts' );
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'jumpoff_plugins' );
		wp_enqueue_script( 'jumpoff_scripts' );
		
		//Threaded Comments
		if( get_option( 'thread_comments' ) )  { wp_enqueue_script( 'comment-reply' ); }
		if ( is_front_page() ) {}
	}
}
?>