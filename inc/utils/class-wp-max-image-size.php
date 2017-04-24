<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * WP Max Image Size
 * Sets a max upload size for all wp user submitted images.
 */
class WP_Max_Image_Size {

  /**
   * Set max upload size
   */
  const UPLOAD_MAX_SIZE = '850 KB';

  /**
   * Constructor
   */
  public function __construct()  {  
    // https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_handle_upload_prefilter
    add_filter('wp_handle_upload_prefilter', array($this, 'error_message'));
  }  

  /**
   * Image Limit
   * Return out const for max upload size.
   * Using a method as we may want to do additional stuff here in the future. .
   */
  public function img_limit() {
    $limit = self::UPLOAD_MAX_SIZE;
    
    return $limit;
  }

  /** 
   * Error Message
   */
  public function error_message($file) {
    $size = $file['size'];
    $size = $size / 1024;
    $type = $file['type'];
    $is_image = strpos($type, 'image');
    $limit = $this->img_limit();
    
    // If size of image is greater than our const, no go
    if ( ( $size > $limit ) && ($is_image !== false) ) {
       $file['error'] = 'Whoa! Images must be smaller '.$limit;
    }
    return $file;
  }
}
$WP_Max_Image_Size = new WP_Max_Image_Size;
