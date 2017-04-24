<?php
/**
 * Partial: Next
 * Partial for showing links to the next post
 *
 * @author    Thomas Vaeth
 * @package   partials/partial-next
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$next_post = get_adjacent_post(false, '', true);
$post_type = get_post_type();
?>

<?php 
if (is_singular('post') OR is_singular('events')) :
  if ($next_post) :
    include(locate_template('partials/content/content-next.php'));
  else :
  
  $args = array(
    'post_type' => $post_type,
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC'
  );
  $next_post_arr = get_posts($args);
  $next_post = $next_post_arr[0]->ID;
    include(locate_template('partials/content/content-next.php'));
  endif; 
endif;
?>