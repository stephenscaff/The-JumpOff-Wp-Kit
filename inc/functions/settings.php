<?php
/*-----------------------------------------------*/
/* SETTINGS FUNCTIONS:
/* Permalinks
/* Images - Sizes
/* Images - Remove HxW
/* Images - Stop Autolinking
/* Images- Default upload settings
/*
/*-----------------------------------------------*/

/*-----------------------------------------------*/
/* Set Permalinks
/*-----------------------------------------------*/
function jumpoff_set_permalinks() {
  global $wp_rewrite;
  $wp_rewrite->set_permalink_structure( '/blog/%year%/%monthnum%/%postname%/' );
}
add_action( 'init', 'jumpoff_set_permalinks' );


/*-----------------------------------------------*/
/* Defualt Images - Thumb
/*-----------------------------------------------*/
update_option( 'thumbnail_size_w', 300 );
update_option( 'thumbnail_size_h', 300 );
update_option( 'thumbnail_crop', 1 );

/*-----------------------------------------------*/
/* Defualt Images - Medium 
/*-----------------------------------------------*/
update_option( 'medium_size_w', 850 );
update_option( 'medium_size_h', 578 );

/*-----------------------------------------------*/
/* Defualt Images - Large
/*-----------------------------------------------*/
update_option( 'large_size_w', 1250 );
update_option( 'large_size_h', 815 );

/*-----------------------------------------------*/
/* Masthead Image Size - For Mastheads
/*-----------------------------------------------*/
add_image_size( 'team-profile', 1250, 1200);

/*-----------------------------------------------*/
/* Masthead Image Size - For Mastheads
/*-----------------------------------------------*/
add_image_size( 'mast-image', 2000, 1250);

/*-----------------------------------------------*/
/* Add custom images to Admin
/*-----------------------------------------------*/
function jumpoff_custom_sizes($sizes) {
 $addsizes = array(
  "masthead-image" => __( "Masthead Images")
 );

 $newsizes = array_merge($sizes, $addsizes);
 return $newsizes;
}

add_filter( 'image_size_names_choose', 'jumpoff_custom_sizes' );

/*----------------------------------------------*/
/* jumpoff_remove_width_attribute
/* 
/* Images: Remove auto HxW
/*----------------------------------------------*/
function jumpoff_remove_width_attribute( $html ) {
 $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
 return $html;
}
add_filter( 'post_thumbnail_html', 'jumpoff_remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'jumpoff_remove_width_attribute', 10 );



/*-----------------------------------------------*/
/* jumpoff_default_img_settings
/*  
/* Default Image Settings
/* Some defaults for the image uploader
/*-----------------------------------------------*/
function jumpoff_default_img_settings() {
 // no alignment
 update_option('image_default_align', 'none' );
 // don't auto link
 update_option('image_default_link_type', 'none' );
 //insert at full width
 update_option('image_default_size', 'full-size' );

}
add_action('after_setup_theme', 'jumpoff_default_img_settings');


@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


/*-----------------------------------------------*/
/* jumpoff_widgets_init
/*  
/* Registers widgets, if that's your thing
/*-----------------------------------------------
function jumpoff_widgets_init() {

 register_sidebar( array(
  'name'          => 'Home right sidebar',
  'id'            => 'home_right_1',
 ) );

}
add_action( 'widgets_init', 'jumpoff_widgets_init' );
*/
?>