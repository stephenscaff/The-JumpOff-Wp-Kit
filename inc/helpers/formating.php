<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/** 
 *  jumpoff_format_dashes
 *  Builds id friedly string by replacing whitespace with dashes
 *  and converting to lowercase
 *  @return: $classes (string)
 */
function jumpoff_format_dashes($string) {
  //Lower case everything
  $string = strtolower($string);
  //Make alphanumeric (removes all other characters)
  $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
  //Clean up multiple dashes or whitespaces
  $string = preg_replace("/[\s-]+/", " ", $string);
  //Convert whitespaces and underscore to dash
  $string = preg_replace("/[\s_]/", "-", $string);

  return $string;
}



/** 
 *  jumpoff_line_wrap ()
 *  Gets line breaks from a field and wraps
 *  them in span or list.
 *
 *  @param   string $type Markup wrapping lines
 *  @return  $output
 *  @example 
 *           jumpoff_line_wrap($fieldname, 'span')
 */
function jumpoff_line_wrap ( $textarea, $type="list" ){
  // Get each line break from our field/input
  $lines = explode("\n", $textarea);
  $output = '';
  // If we have something
  if ( !empty($lines) ) {
    
    // Loop through all our lines
    // Would never exceed 5
    foreach ( $lines as $line ) {

      // If is $type = list
      if ($type == 'list'){
        $output .= '<li>'. trim( $line ) .'</li>';
      } 
      // If $type = span
      elseif ($type == 'span'){
        $output .= '<span>'. trim( $line ) .'</span>';
      }
      elseif ($type == 'slice'){
        $output .= '<span class="oh"><span>'. trim( $line ) .'</span></span>';
      }
      
    }
  }
  return $output;
}