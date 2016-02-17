<?php
/*-----------------------------------------------*/
/* POST FUNCTIONS:
/* Post Images
/* Post Excerpts
/* Post Metas
/* Pagination
/*-----------------------------------------------*/ 


/*-----------------------------------------------*/
/* COntent Image Figure Wrap
/* Unauto p's content images, and wraps in a figure element.
/* Uses the_content filter.
/*-----------------------------------------------
function jumpoff_img_figure_wrap($figureimg) {
$figureimg = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $figureimg);
return $figureimg;
}
add_filter( 'the_content', 'jumpoff_img_figure_wrap', 10 );
*/

/*-----------------------------------------------*/
/* Wrap images in figure, captions in a figcap
/* Happens in the editor (image_send_to_editor)
/*-----------------------------------------------*/
function jumpoff_html5_insert_image($html, $id, $caption, $title, $align, $url, $size, $alt) {
  $src  = wp_get_attachment_image_src( $id, $size, false );
  $html5_str = "<figure id='media-" .$id . "' class='align-" . $align . "'>";
  $html5_str .= "<img src='" . $src[0] . "' alt='" . $alt . "' />";
  if ($caption) {
    $html5_str .= "<figcaption>" . $caption ."</figcaption>";
  }
  $html5_str .= "</figure>";
  return $html5_str;
}
add_filter( 'image_send_to_editor', 'jumpoff_html5_insert_image', 10, 9 );

/*-----------------------------------------------*/
/* jumpoff Title - 
/* Outputs a shortened the_title via length arg (by char)
/* @example jumpoff_title(100);
/*-----------------------------------------------*/
function jumpoff_title($characters, $rep='...') {
 $title = the_title('','',false);
 $shortened_title = jumpoff_text_limit($title, $characters, $rep);
 echo $shortened_title;
}

/*-----------------------------------------------*/
/* Excerpts: Kick Rocks Read More
/*-----------------------------------------------*/
function jumpoff_new_excerpt_more($more) {
 return '...';
}
add_filter('excerpt_more', 'jumpoff_new_excerpt_more');

/*-----------------------------------------------*/
/* Excerpt: Limit Default excerpt, 
/* if excerpt field is not completed
/* @example jumpoff_short_excerpt(get_the_excerpt());
/*-----------------------------------------------*/
function jumpoff_short_excerpt($string) {
   echo substr($string, 0, 200); 
}

/*-----------------------------------------------*/
/* jumpoff Excerpt - 
/* Outputs a shortened get_the_excerpt via length arg (by char)
/* @example jumpoff_excerpt(100);
/*-----------------------------------------------*/
function jumpoff_excerpt($characters, $rep='...') {
 $excerpt = get_the_excerpt('','',false);
 $shortened_excerpt = jumpoff_text_limit($excerpt, $characters, $rep);
 echo $shortened_excerpt;
}

/*-----------------------------------------------*/
/* Excerpt: by character 
/* Useage: <?php echo jumpoff_get_excerpt(); ?>
/*-----------------------------------------------*/
function jumpoff_get_excerpt($characters){
 if ( !empty( $post->post_excerpt ) ) :
 $excerpt = get_the_content();
else :
 $excerpt = get_the_excerpt();
endif;
 $characters = 200;
 $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
 $excerpt = strip_shortcodes($excerpt);
 $excerpt = strip_tags($excerpt);
 $excerpt = substr($excerpt, 0, $characters);
 $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
 $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
 if(strlen($excerpt) > 200) :

 $excerpt = substr($excerpt, 0,  200) . '&#8230;';

endif;
 //$excerpt = $excerpt.'... <a href="'.$permalink.'">...</a>';
return $excerpt;
}


/*-----------------------------------------------*/
/* Metas: Date/Time
/*-----------------------------------------------*/
function jumpoff_entry_meta() {
 echo ' <time class="updated date big grey" datetime=" '. get_the_time('c') .'" pubdate>'. sprintf(__('Published on %s', 'jumpoff'), get_the_time('M d Y'), get_the_time()) .'</time>'; 
}


/*-----------------------------------------------*/
/* Pagination
/*-----------------------------------------------*/
function jumpoff_pagination() {
 global $wp_query;
 
 $big = 999999999; // This needs to be an unlikely integer
 
 // For more options and info view the docs for paginate_links()
 // http://codex.wordpress.org/Function_Reference/paginate_links
 $paginate_links = paginate_links( array(
  'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
  'current' => max( 1, get_query_var('paged') ),
  'total' => $wp_query->max_num_pages,
  'mid_size' => 5,
  'prev_next' => True,
     'prev_text' => __('‹ Prev'),
     'next_text' => __('Next ›'),
  'type' => 'list'
 ) );
 
 // Display the pagination if more than one page is found
if ( $paginate_links ) {
  //echo '<div class="pagination__links">';
  echo $paginate_links;
  //echo '</div><!--// end .pagination -->';
 }
}



?>