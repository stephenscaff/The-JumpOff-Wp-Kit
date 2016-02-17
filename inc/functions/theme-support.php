<?php
/*-----------------------------------------------*/
/* THEME SUPPORT FUNCTIONS:
/* Post Thumbnails
/* Post Formats

/*-----------------------------------------------*/


/*-----------------------------------------------*/
/* Add Support: Featured Images
/*-----------------------------------------------*/
add_theme_support( 'post-thumbnails' ); 

/*-----------------------------------------------*/
/* Featured Images - position meta box higher
/*-----------------------------------------------*/
function jumpoff_add_metaboxes(){
 add_meta_box('postimagediv', __('Featured Image'), 'post_thumbnail_meta_box', 'post', 'side', 'high');
}
add_action( 'add_meta_boxes', 'jumpoff_add_metaboxes' );

/*-----------------------------------------------*/
/* Add Support: Post Formats
/*
/* Available" 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'
/*-----------------------------------------------*/
add_theme_support('post-formats', array('video', 'image'));

/*-----------------------------------------------*/
/* Add html5 Theme Support
/*-----------------------------------------------*/
add_theme_support( 'html5', array( 'search-form', 'caption' ) );

