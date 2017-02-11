<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Users - Remove and add fields to User page
 */
function jumpoff_contact_information($contactmethods) {
  // Removing Fields

  // Adding New Fields
  $contactmethods['facebook'] = 'Facebook';
  $contactmethods['twitter'] = 'Twitter';
  $contactmethods['phone'] = 'Phone Number';
  $contactmethods['avatar'] = 'Avatar';
  $contactmethods['position'] = 'Position';
  $contactmethods['quote'] = 'Quote';

  return $contactmethods;
}
add_filter('user_contactmethods', 'jumpoff_contact_information');