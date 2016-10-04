<?php
/*-----------------------------------------------*/
/*  Users: 
/*  01: Add new contact methods, remove stupid ones
/*-----------------------------------------------*/
function jumpoff_contact_information($contactmethods) {
  // Removing Fields
  unset($contactmethods['aim']);
  unset($contactmethods['yim']);
  unset($contactmethods['jabber']);

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



?>