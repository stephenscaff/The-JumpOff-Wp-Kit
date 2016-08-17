<?php
/*-----------------------------------------------*/
/* POST FUNCTIONS:
/*-----------------------------------------------*/ 

/*-----------------------------------------------*/
/*  jumpoff_vid()
/*  wraps videos in post editor with flex-vid class
/*-----------------------------------------------*/ 
function jumpoff_vid_embed($html, $url, $attr, $post_id) {
  return '<div class="flex-vid">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'jumpoff_vid_embed', 99, 4);




?>