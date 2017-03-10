<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 * Add user Hints/Messages for image sizes and whatnot 
 * 
 * @return string  $content A markup snippet
 */
class AdminHints{
  
  function __construct(){
    add_filter( 'admin_post_thumbnail_html', array( $this, 'featured_img') );
  }

  /**
   * Featured Image Meta Hints
   */
  function featured_img_helps($content){
    global $post_type;  

    // Target post types (use elseif for additional post types)
    if ( 'post_type_name' == $post_type ) {
      $content .= '<p>Featured and Mast Image: <br /> Size to 2000x1200px.</p><br/>';
    }
    // Default
    else{
      $content .= '<p>Featured images appear in the Masthead and blog index previews. Size to 2000x1200px. Insert Shortcode: <br/><br/><code class="code-inline code-inline-block">[featured-image]</code> </p><br/>';
    }
  }

  /**
   * Admin Footer Message
   */
  function admin_footer(){
    _e( '<span id="footer-thankyou">Developed by <a href="http://urbaninfluence.com" target="_blank">Urban Influence</a></span>' );
  }
}
new AdminHints;