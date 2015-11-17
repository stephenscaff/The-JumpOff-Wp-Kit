<?php
/*-----------------------------------------------*/
/* POST FUNCTIONS:
/* Post Formats
/* Post Images
/* Post Excerpts
/* Post Metas
/* Pagination
/* Popular Posts
/*-----------------------------------------------*/

/*-----------------------------------------------*/
/* Post Formats
/*-----------------------------------------------*/
add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'));

/*----------------------------------------------*/
/* Images: Remove auto HxW
/*----------------------------------------------*/
function jumpoff_remove_width_attribute( $html ) {
 $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
 return $html;
}
add_filter( 'post_thumbnail_html', 'jumpoff_remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'jumpoff_remove_width_attribute', 10 );

/*-----------------------------------------------*/
/* Images: Stop autolinking
/*-----------------------------------------------*/
update_option('image_default_link_type','none');

/*-----------------------------------------------*/
/* Images: img unautop - 
/* Stops Wp from wrapping images in a p tag
/*-----------------------------------------------*/
function jumpoff_img_unautop($pee) {
$pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
return $pee;
}
add_filter( 'the_content', 'jumpoff_img_unautop', 10 );

/*-----------------------------------------------*/
/*	Images - Grab first image in post
/*-----------------------------------------------*/
function catch_that_image() {
 global $post, $posts;
 $first_img = '';
 ob_start();
 ob_end_clean();
 $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
 $first_img = $matches [1] [0];
 $url =  get_template_directory_uri();
 if(empty($first_img)){ //Defines a default image
   $first_img = "$url/assets/images/nopic.jpg";
 }
 return $first_img;
}


/*-----------------------------------------------*/
/* Excerpts: Kick Rocks Read More
/*-----------------------------------------------*/
function jumpoff_new_excerpt_more($more) {
 return '...';
}
add_filter('excerpt_more', 'jumpoff_new_excerpt_more');


/*-----------------------------------------------*/
/* Excerpt: by character or work
/* Usage: <?php the_excerpt('...'); ?>
/*-----------------------------------------------*/
function jumpoff_custom_excerpt_length( $length ) {
 return 26;
}
add_filter( 'excerpt_length', 'jumpoff_custom_excerpt_length', 999 );


/*-----------------------------------------------*/
/* Excerpt: by character 
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
/* Get Excerpt from custom fields, declared inline
/*-----------------------------------------------*/
function custom_field_excerpt($field) {
 global $post;
 $text = get_field($field);
 if ( '' != $text ) {
  $text = strip_shortcodes( $text );
  $text = apply_filters('the_content', $text);
  $text = str_replace(']]>', ']]>', $text);
  $excerpt_length = 25; // 20 words
  $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
  $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
 }
 return apply_filters('the_excerpt', $text);
}

/*-----------------------------------------------*/
/*	Metas: Date/Time
/*-----------------------------------------------*/
function jumpoff_entry_meta() {
	echo ' <time class="updated date big grey" datetime=" '. get_the_time('c') .'" pubdate>'. sprintf(__('Published on %s', 'jumpoff'), get_the_time('M d Y'), get_the_time()) .'</time>'; 
}


/*-----------------------------------------------*/
/*	Pagination
/*-----------------------------------------------*/
function jumpoff_pagination() {
	global $wp_query;
 
	$big = 999999999; // This needs to be an ekely integer
 
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




/*------------------------------------------------------*/
/*	Popular Posts Dopeness - Track by page views
/*-------------------------------------------------------
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

USEAGE:
		<ul class="posts-list">
		<?php
			query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
			if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li>
			<h5><a href="<? the_permalink()?>"><?php the_title(); ?></a></h5> 
			<span class="meta-date"><?php echo get_the_time('M, j'); ?></span>		
			</li>
			<?php
			endwhile; endif;
			wp_reset_query();
		?>
		</ul>
*/

?>