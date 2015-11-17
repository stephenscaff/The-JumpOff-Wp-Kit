<?php
/*===================================================================================
Circular Navigation for Single CPT files (or just your single.php)
From: 
http://wordpress.org/plugins/loop-post-navigation-links/
 
Example Useage:
For use with next / last post markup that would look a little something like this:
<div id="folio-nav">
  <div class="prev-post">
   <?php jumpoff_previous_or_loop_post_link( '%link', '<span class="icon-left"></span>'); ?>
  </div>
  <div class="next-post"> 
   <?php jumpoff_next_or_loop_post_link( '%link', '<span class="icon-right"></span>'); ?>
  </div>
</div>
===================================================================================*/
 
defined( 'ABSPATH' ) or die();
 
global $jumpoff_loop_navigation_find;
$jumpoff_loop_navigation_find = false;
 
//jumpoff_next_or_loop_post_link function
if ( ! function_exists( 'jumpoff_next_or_loop_post_link' ) ) :
 
function jumpoff_next_or_loop_post_link( $format='%link &raquo;', $link='%title', $in_same_cat = false, $excluded_categories = '' ) {
 jumpoff_adjacent_or_loop_post_link( $format, $link, $in_same_cat, $excluded_categories, false );
}
add_action( 'jumpoff_next_or_loop_post_link', 'jumpoff_next_or_loop_post_link', 10, 4 );
endif;
 
if ( ! function_exists( 'jumpoff_previous_or_loop_post_link' ) ) :
 
// Display previous post link that's next door to current post. If none, then hows about the last post in series.
function jumpoff_previous_or_loop_post_link( $format='&laquo; %link', $link='%title', $in_same_cat = false, $excluded_categories = '' ) {
 jumpoff_adjacent_or_loop_post_link( $format, $link, $in_same_cat, $excluded_categories, true );
}
add_action( 'jumpoff_previous_or_loop_post_link', 'jumpoff_previous_or_loop_post_link', 10, 4 );
endif;
 
if ( ! function_exists( 'jumpoff_adjacent_or_loop_post_link' ) ) :
 
//Display adjacent post link or the post link for the post at the opposite end of the series.
function jumpoff_adjacent_or_loop_post_link( $format, $link, $in_same_cat = false, $excluded_categories = '', $previous = true ) {
 if ( $previous && is_attachment() && is_object( $GLOBALS['post'] ) )
  $post = get_post( $GLOBALS['post']->post_parent );
 else
  $post = get_adjacent_post( $in_same_cat, $excluded_categories, $previous );
 
 // START The only modification of adjacent_post_link() -- get the last/first post if there isn't a legitimate previous/next post
 if ( ! $post ) {
  global $jumpoff_loop_navigation_find;
  $jumpoff_loop_navigation_find = true;
  $post = get_adjacent_post( $in_same_cat, $excluded_categories, $previous );
  $jumpoff_loop_navigation_find = false;
 }
 // END modification
 
 if ( ! $post ) {
  $output = '';
 } else {
  $title = $post->post_title;
 
  if ( empty( $post->post_title ) )
   $title = $previous ? __( 'Previous Post' ) : __( 'Next Post' );
 
  $title = apply_filters( 'the_title', $title, $post->ID );
  $date = mysql2date( get_option( 'date_format' ), $post->post_date );
  $rel = $previous ? 'prev' : 'next';
 
  $string = '<a href="' . get_permalink( $post ) . '" rel="' . $rel . '">';
  $link = str_replace( '%title', $title, $link );
  $link = str_replace( '%date', $date, $link );
  $link = $string . $link . '</a>';
 
  $output = str_replace( '%link', $link, $format );
 }
 
 $adjacent = $previous ? 'previous' : 'next';
 
 // Apply the filters present in WP's adjacent_or_loop_post_link()
 $output = apply_filters( "{$adjacent}_post_link", $output, $format, $link, $post );
 
 // Apply old {$adjacent}_or_loop_post_link filters.
 // Deprecated as of v2.0. Here temporarily for backwards compatibility.
 $output = apply_filters( "{$adjacent}_or_loop_post_link", $output, $format, $link, $post );
 
 // Apply custom filters and echo
 echo apply_filters( "jumpoff_{$adjacent}_or_loop_post_link_output", $output, $format, $link, $post );
}
add_action( 'jumpoff_adjacent_or_loop_post_link', 'jumpoff_previous_or_loop_post_link', 10, 5 );
endif;
 
if ( ! function_exists( 'jumpoff_modify_nextprevious_post_where' ) ) :
 
// Modifies the SQL WHERE clause used by WordPress when getting a previous/next post to accommodate looping navigation.
//Can be either next post link or previous.
function jumpoff_modify_nextprevious_post_where( $where ) {
 // The incoming WHERE statement generated by WordPress is a condition for the date, relative to the current
 // post's date.  To find the post we want, we just need to get rid of that condition (which is the first) and retain the others.
 if ( $GLOBALS['jumpoff_loop_navigation_find'] )
  $where = preg_replace( '/WHERE (.+) AND/imsU', 'WHERE', $where );
 return $where;
}
endif;
 
//Register actions to filter WHERE clause when previous or next post query is being processed.
add_filter( 'get_next_post_where',     'jumpoff_modify_nextprevious_post_where' );
add_filter( 'get_previous_post_where', 'jumpoff_modify_nextprevious_post_where' );

?>