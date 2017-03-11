<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 * Add user Hints/Messages for image sizes and whatnot 
 * 
 * @return string  $content A markup snippet
 */

class AdminHints{
  
  function __construct(){
    add_filter( 'admin_post_thumbnail_html', array( $this, 'ft_img_size_hints'));
  }

  /**
   * Featured Image Meta Hints
   */
  function ft_img_size_hints( $content ) {
    global $post_type;

    if ( 'resources_cat' == $post_type ) {
      $content .= '<p>The Featured Image appears on feeds: <br /> Size to 1250x1250.</p>';
    }
    elseif ( 'team' == $post_type ) {
      $content .= '<p>The Product Image appears on feeds: <br /> Size all product images to 1250x1250.</p><p>Use the Product Gallery below for the single product slider</p><p>Variation images are added from the Variations tab in Proudct Data.</p>';
    }
    else {
      $content .= '<p>Featured images appear in the Masthead and blog index previews. Size to 2000x1200px.<br/>';
    }

    return $content;
  }

  /**
   * Admin Footer Message
   */
  function admin_footer(){
    _e( '<span id="footer-thankyou">Developed by <a href="http://urbaninfluence.com" target="_blank">Urban Influence</a></span>' );
  }
}
new AdminHints;