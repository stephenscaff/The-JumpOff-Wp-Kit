<?php

/*-----------------------------------------------*/
/*	Blog Page Images - Grab first image in post
/*-----------------------------------------------*/
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}

/*--------------------------------------------------*/
/*	Images: Remove auto HxW
/*--------------------------------------------------*/
function jumpoff_remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

/*--------------------------------------------------*/
/*	Images: Stop autolinking
/*--------------------------------------------------*/
update_option('image_default_link_type','none');


/*-----------------------------------------------*/
/*	Post Entry Meta
/*-----------------------------------------------*/
function jumpoff_entry_meta() {
	echo ' <time class="updated date big grey" datetime=" '. get_the_time('c') .'" pubdate>'. sprintf(__('Published on %s', 'jumpoff'), get_the_time('M d Y'), get_the_time()) .'</time>'; 
}

/*-----------------------------------------------*/
/*	Excerpt: by character or work
/* Usage: <?php the_excerpt('...'); ?>
/*-----------------------------------------------*/
function jumpoff_custom_excerpt_length( $length ) {
	return 26;
}

/*-----------------------------------------------*/
/*	Excerpt: by character 
/* Useage: <?php echo jumpoff_get_excerpt(); ?>
/*-----------------------------------------------*/
function jumpoff_get_excerpt(){
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, 120);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$excerpt = $excerpt.'...';
	//$excerpt = $excerpt.'... <a href="'.$permalink.'">...</a>';
return $excerpt;
}

/*-----------------------------------------------*/
/*	Kick Rocks Read More
/*-----------------------------------------------*/
function jumpoff_new_excerpt_more($more) {
	return '...';
}

/*-----------------------------------------------*/
/*	Pagination
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
	    'prev_text' => __('<span aria-hidden="true" class="icon-left-chev"></span>'),
	    'next_text' => __('<span aria-hidden="true" class="icon-right-chev"></span>'),
		'type' => 'list'
	) );
 
	// Display the pagination if more than one page is found
	if ( $paginate_links ) {
		echo '<div class="jumpoff-pagination">';
		echo $paginate_links;
		echo '</div><!--// end .pagination -->';
	}
}

/*-----------------------------------------------*/
/*	img unautop - 
/* Stops Wp from wrapping images in a p tag
/*-----------------------------------------------*/
function jumpoff_img_unautop($pee) {
$pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
return $pee;
}


/*-----------------------------------------------*/
/*	Post Formats
/*-----------------------------------------------*/
add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'));



?>