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
function custom_excerpt_length( $length ) {
	return 26;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/*-----------------------------------------------*/
/*	Excerpt: by character 
/* Useage: <?php echo get_excerpt(); ?>
/*-----------------------------------------------*/
function get_excerpt(){
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
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


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
	    'prev_text' => __('<span aria-hidden="true" class="icon-arrow-left"></span>'),
	    'next_text' => __('<span aria-hidden="true" class="icon-arrow-right"></span>'),
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
function img_unautop($pee) {
$pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
return $pee;
}
add_filter( 'the_content', 'img_unautop', 10 );

/*-----------------------------------------------*/
/*	Remove P Editor Option - 
/* Option to remove post's auto p wrap and
/* convert breaks to br tags
/*-----------------------------------------------*/
add_action('admin_menu', 'removep_meta_box_add');
add_action('edit_post', 'removep_post_meta_tags');
add_action('publish_post', 'removep_post_meta_tags');
add_action('save_post', 'removep_post_meta_tags');
add_action('edit_page_form', 'removep_post_meta_tags');
add_filter('the_content', 'removep_wpautop', 9);
//Add meta boxes to posts, pages, portfolio
function removep_meta_box_add() {
	if ( function_exists('add_meta_box') ) {
		add_meta_box('removep',__('Remove P', 'removep'),'removep_meta','post');
		add_meta_box('removep',__('Remove P', 'removep'),'removep_meta','page');
		add_meta_box('removep',__('Remove P', 'removep'),'removep_meta','portfolio');
	}
}


function removep_post_meta_tags($id) {
	//$removep_edit = $_POST["removep_edit"];
	if (isset($removep_edit) && !empty($removep_edit)) {
	$removep_edit = $_POST["removep_edit"];
	$status = $_POST["removep"];
	delete_post_meta($id, '_removep');
	$br = $_POST["removep_br"];
	delete_post_meta($id, '_removep_br');
		if (isset($status) && !empty($status)) {
			add_post_meta($id, '_removep', $status);
		    }
		if (isset($br) && !empty($br)) {
			add_post_meta($id, '_removep_br', $br);
		   }
	  }
	}
/*-----------------------------------------------*/
/*	RemoveP - Build admin metas
/*-----------------------------------------------*/
function removep_meta() {
	global $post;
	$post_id = $post;
	if (is_object($post_id)){
		$post_id = $post_id->ID;
	}
 	$status = get_post_meta($post_id, '_removep', true);
 	$br = get_post_meta($post_id, '_removep_br', true);
	?>
	<input type="hidden" value="1" name="removep_edit">
	<table >
	<tr>
	<td scope="row" style="text-align:left;"><input type="checkbox" name="removep" id="removepp" value="1" <?php  if ($status) echo 'checked="checked"'; ?> /><label for="removepp"> Remove Extra Paragraphs in this <?php  if($post->post_type=='page'){ ?>page<?php  } else { ?>post<?php  } ?>.</label></td>
	</tr>
	<tr>
	<td scope="row" style="text-align:left;"><input type="checkbox" name="removep_br" id="removep_br" value="1" <?php  if ($br) echo 'checked="checked"'; ?> /><label for="removep_br"> Also convert line breaks to br tags ( only work if Remove Extra Paragraphs is enabled ).</label></td>
	</tr>
	</table>
<?php
}

/*-----------------------------------------------*/
/*	Removep
/*-----------------------------------------------*/
function removep_wpautop($content) {
	global $post;
	
	if (is_page() || is_object($post)){
		
		if (get_post_meta($post->ID, '_removep', true)&&!function_exists('add_meta_box'))    {
			remove_filter('the_content', 'wpautop');
			
			if (get_post_meta($post->ID, '_removep_br', true)){
				$content=nl2br($content);
			}
		}
	}
	return $content;
}

/*-----------------------------------------------*/
/*	Captions
/*-----------------------------------------------*/
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );
/**
 * Cleans up the default WordPress [caption] shortcode.  The main purpose of this function is to remove the 
 * inline styling WP adds, which creates 10px of padding around captioned elements.
 *
 * @since 0.1.0
 * @access private
 * @param string $output The output of the default caption (empty string at this point).
 * @param array $attr Array of arguments for the [caption] shortcode.
 * @param string $content The content placed after the opening [caption] tag and before the closing [/caption] tag.
 * @return string $output The formatted HTML for the caption.
 */
function cleaner_caption( $output, $attr, $content ) {
	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;
	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);
	/* Allow developers to override the default arguments. */
	$defaults = apply_filters( 'cleaner_caption_defaults', $defaults );
	/* Apply filters to the arguments. */
	$attr = apply_filters( 'cleaner_caption_args', $attr );
	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );
	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;
	/* Set up the attributes for the caption <div>. */
	$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
	//$attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';
	/* Open the caption <div>. */
	$output = '<figure' . $attributes .'>';
	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );
	/* Append the caption text. */
	$output .= '<figcaption class="wp-caption-text">' . $attr['caption'] . '</figcaption>';
	/* Close the caption </div>. */
	$output .= '</figure>';
	/* Return the formatted, clean caption. */
	return apply_filters( 'cleaner_caption', $output );
}



/*-----------------------------------------------*/
/*	Post Formats
/*-----------------------------------------------*/
add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'));

/*-----------------------------------------------*/
/*	Remove Visual Editor form Admin
/*-----------------------------------------------*/
add_filter ( 'user_can_richedit' , create_function ( '$a' , 'return false;' ) , 50 );

/*-----------------------------------------------*/
/*	Customize output of editor buttons
/*-----------------------------------------------*/
function jumpoff_remove_quicktags( $qtInit ) {
    $qtInit['buttons'] = 'strong,em,block,del,ul,ol,li,link,code,fullscreen';
    return $qtInit;
}
add_filter('quicktags_settings', 'jumpoff_remove_quicktags');

/*-----------------------------------------------*/
/*	Add Text Editor Buttons
/*-----------------------------------------------*/
function jumpoff_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
	QTags.addButton( 'h4-subheader', 'SubHeader', '<h4>', '</h4>', '4', 'Sub Header', 1 );
    QTags.addButton( 'hr-sep', 'HR Seperator', '<hr class="sep"/>', '', 's', 'Horizontal rule line', 201 );
	QTags.addButton( 'arrow-link', 'Link Arrow&rarr;', '<a class="link-arrow" target="_blank" href="">', '</a>', 'z', 'Link Arrow', 200 );
	QTags.addButton( 'figcaption', 'Caption', '<figcaption>', '</figcaption>', 'f', 'Figcaption', 203 );
	QTags.addButton( 'code-inline', '&lcub;Code&rcub; Inline', '<code class="inline"/>', '', 's', 'Code: Inline', 204 );
	QTags.addButton( 'code-js', '&lcub;Code&rcub; JS', '<pre><code class="language-javascript">', '</code></pre>', 'j', 'Code: JS', 205 );
	QTags.addButton( 'code-html', '&lcub;Code&rcub; HTML', '<pre><code class="language-markup">', '</code></pre>', 'j', 'Code: HTML', 206 );
	QTags.addButton( 'code-css', '&lcub;Code&rcub; CSS', '<pre><code class="language-css">', '</code></pre>', 'j', 'Code: CSS', 207 );
    </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'jumpoff_add_quicktags' );
?>