<?php
/*-----------------------------------------------*/
/*  POST TEMPLATE FUNCTIONS
/*  Functions and helpers related to working with post elements
/*-----------------------------------------------*/ 

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
* jumpoff_text_limit
*  
* Function to limit text length outputs. Used in functions below
*
* @param $string (int) : number of chars to output
* @param $length (int) : desired char length
* @param $replacer
* @return $string
*/ 

function jumpoff_text_limit($string, $length, $replacer) {
  if(strlen($string) > $length)
  return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
  return $string;
}

/**
* jumpoff_excerpt
* Outputs a shortened get_the_excerpt via length arg (by char)
*
* @param $$characters (int) : number of chars to output
* @param $rep (string) : ellipser
* @example:      jumpoff_excerpt(100);
* @todo change this to a return
*/ 

function jumpoff_excerpt($characters, $rep='...') {
  $excerpt = get_the_excerpt('','',false);
  $shortened_excerpt = jumpoff_text_limit($excerpt, $characters, $rep);
  echo $shortened_excerpt;
}

/**
* jumpoff_title
* Outputs a shortened the_title via length arg (by char)
*
* @param $characters (int) : number of chars to output
* @param $rep (string) : ellipser
* @return $shortened_title
*/ 
function jumpoff_title($characters, $rep='...') {
  // Get the title via wp's the_title
  $title = the_title('','',false);
  
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


?>