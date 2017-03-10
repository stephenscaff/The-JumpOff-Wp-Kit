<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 *  jumpoff_text_limit
 *  
 *  Function to limit text length outputs. Used in functions below
 *
 *  @param int  $string Number of chars to output
 *  @param int  $length Desired char length
 *  @param string  $replacer
 *  @return $string
 */ 

function jumpoff_text_limit($string, $length, $replacer) {
  if(strlen($string) > $length)
  return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
  return $string;
}

/**
 *  jumpoff_excerpt
 *
 *  Outputs a shortened get_the_excerpt via length arg (by char)
 *
 *  @todo     change this to a return
 *  @param    int  $characters Number of chars to outputv
 *  @param    string  $rep Ellipser
 *  @example  jumpoff_excerpt(100);
 * 
 */ 

function jumpoff_excerpt($characters, $rep='...') {
  $excerpt = get_the_excerpt('', '', false);
  $shortened_excerpt = jumpoff_text_limit($excerpt, $characters, $rep);
  echo $shortened_excerpt;
}

/**
 *  jumpoff_title
 *
 *  Outputs a shortened the_title via length arg (by char)
 *
 *  @param int  $characters Number of chars to output
 *  @param string  $rep Ellipser
 *  @return $shortened_title
 */ 
function jumpoff_title($characters, $rep='...') {
  
  // Get the title via wp's the_title
  $title = the_title('', '', false);
  
  // Run through our text limit funciton
  $shortened_title = jumpoff_text_limit($title, $characters, $rep);

  // Return 
  return $shortened_title;
}

/**
 *  jumpoff_title_firstword
 *  Get first work from title
 *  @return $title
 */ 
function jumpoff_title_firstword(){
  $title = current(explode(' ', get_the_title()));
  return $title;
}

/**
 * jumpoff_vid_embed
 * 
 * use embed filter to wrap video oEmbeds 
 */ 
function jumpoff_vid_embed($html, $url, $attr, $post_id) {
  return '<div class="flex-vid">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'jumpoff_vid_embed', 99, 4);


/**
 *  jumpoff_source_tag
 *  
 *  A grouping of options for outputing pretitles containing the 
 *  post type name, archive link, or a sim-link for blocklevel links
 *
 * @param string  $format Desired format
 * @param string  $class Adds a specified class name to the output
 * @return $output
 */ 

function jumpoff_source_tag($format, $class){
  $post_type = get_post_type_object(get_post_type());
  $post_type_name = $post_type->labels->name;
  $post_type_slug = $post_type->rewrite['slug'];
  $post_type_link = get_post_type_archive_link( $post_type_slug );
 
  $output='';

  switch($format){
    case 'name';
      $output = '<span class="' . $class . '">' . $post_type->labels->name . '</span>';
      break;
    case 'url':
      $output = '<a class="' . $class . '" href="' . esc_url($post_type_link ). '">' . $post_type->labels->name . '</a>';
      break;
    case'sim-link':
      $output  = '<span class="' . $class . '" data-sim-link="' . esc_url($post_type_link) . '">' . $post_type->labels->name . '</span>';
      break;
  }

  return $output;
}

?>