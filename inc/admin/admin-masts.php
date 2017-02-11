<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 * Applies help text to the featured image uploads
 * 
 * @return string  $content A markup snippet
 */
function jumpoff_ft_img_help( $content ) {
  global $post_type;

  if ( 'post_type_name' == $post_type ) {
   $content .= '<p>Featured and Mast Image: <br /> Size to 2000x1200px.</p>';
  }
  elseif ( 'another_post_type' == $post_type ) {
    $content .= '<p> Size to about 700x1050px.</p>';
  }
  else {
   $content .= '<p>Featured images appear in the Masthead and blog index previews. Size to 2000x1200px. Insert Shortcode: <br/><br/><code class="code-inline code-inline-block">[featured-image]</code> </p><br/>';
  }

  return $content;
}
add_filter( 'admin_post_thumbnail_html', 'jumpoff_ft_img_help');

/**
 *  Adds a checkbox to the featured image metabox.
 *
 *  @param string  $content
 */
function jumpoff_ft_img_meta( $content ) {
   
  global $post, $post_type;
  
  $text = __( 'Set Featured Image as Mast bg.', 'jumpoff' );
  $id = 'ft_img_mast_bg';
  $value = esc_attr( get_post_meta( $post->ID, $id, true ) );
  $label = 
  '<label for="' . $id . '" class="ft-img-check">
   <input name="' . $id . '" type="checkbox" id="' . $id . '" value="' . $value . ' "'. checked( $value, 1, false) .'> ' . $text .'</label>';

  if (('post' == $post_type ) || 
      ('case-studies' == $post_type ) || 
      ('press-releases' == $post_type )) {
    $content .= $label;
  }
 
  return $content;
}
add_filter( 'admin_post_thumbnail_html', 'jumpoff_ft_img_meta' );


/**
 *  Save featured image meta data when saved
 *
 *  @param int   $post_id The ID of the post.
 *  @param post  $post the post.
 */
function jumpoff_save_ft_img_meta( $post_id, $post, $update ) {
    
    // Set our value to 0 by default
    $value = 0;
    
    // Set to value 1 if checked for that post
    if ( isset( $_REQUEST['ft_img_mast_bg'] ) ) {
      $value = 1;
    }
    // Save our 1 or 0
    update_post_meta( $post_id, 'ft_img_mast_bg', $value );
  
}
add_action( 'save_post', 'jumpoff_save_ft_img_meta', 10, 3 );