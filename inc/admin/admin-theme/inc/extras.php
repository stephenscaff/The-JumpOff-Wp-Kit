<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 * Admin Extras
 * Class to add useful stuff and remove stupid stuff.
 */
class AdminExtras{
  
  function __construct(){
    add_filter( 'admin_footer_text', array( $this, 'admin_footer') );
    add_filter('user_contactmethods', array( $this, 'contact_fields') );
    $this->admin_cleanups();
  }

  /**
   * Featured Image Meta Hints
   */
  function contact_fields($user_fields){

    $user_fields['facebook'] = 'Facebook';
    $user_fields['twitter'] = 'Twitter';
    $user_fields['phone'] = 'Phone Number';
    $user_fields['avatar'] = 'Avatar';
    $user_fields['position'] = 'Position';
    $user_fields['quote'] = 'Quote';

    return $user_fields;
  }

  /**
   * Admin Footer Message
   */
  function admin_footer(){
    _e( '<span id="footer-thankyou">Developed by <a href="http://stephenscaff.com" target="_blank">S Money Scaff</a></span>' );
  }

    /**
   * Admin Clean Ups
   * Clean up any pointless dingleberries
   */
  function admin_cleanups(){
    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
    remove_action( 'additional_capabilities_display', 'additional_capabilities_display' );
  }
}
new AdminExtras;
