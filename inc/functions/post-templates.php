<?php
/*-----------------------------------------------*/
/*  POST TEMPLATE FUNCTIONS
/*  Functions and helpers related to working with post elements
/*-----------------------------------------------*/ 

/*-----------------------------------------------*/
/* jumpoff_title()
/* @description: Outputs a shortened the_title via length arg (by char)
/* @example:     jumpoff_title(100);
/*-----------------------------------------------*/
function jumpoff_title($characters, $rep='...') {
 $title = the_title('','',false);
 $shortened_title = jumpoff_text_limit($title, $characters, $rep);
 echo $shortened_title;
}

/*-----------------------------------------------*/
/*  jumpoff_title_firstword()
/*  @description: Get the first word from a title.
/*-----------------------------------------------*/
function jumpoff_title_firstword(){
  $title = current(explode(' ', get_the_title()));
  echo $title;
}

/*-----------------------------------------------*/
/* Text Limits - 
/* @description:  Function to limit text length outputs
/*                To be called inside title and excerpt functions
/*-----------------------------------------------*/
function jumpoff_text_limit($string, $length, $replacer) {
  if(strlen($string) > $length)
  return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
  return $string;
}

/*-----------------------------------------------*/
/* jumpoff_excerpt
/* @description:  Outputs a shortened get_the_excerpt via length arg (by char)
/* @example:      jumpoff_excerpt(100);
/*-----------------------------------------------*/
function jumpoff_excerpt($characters, $rep='...') {
  $excerpt = get_the_excerpt('','',false);
  $shortened_excerpt = jumpoff_text_limit($excerpt, $characters, $rep);
  echo $shortened_excerpt;
}

/*-----------------------------------------------*/
/*  jumpoff_vid()
/*  wraps videos in post editor with flex-vid class
/*-----------------------------------------------*/ 
function jumpoff_vid_embed($html, $url, $attr, $post_id) {
  return '<div class="flex-vid">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'jumpoff_vid_embed', 99, 4);

?>