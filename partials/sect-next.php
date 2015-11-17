<?php
/**
 * Section: Next Post
 *
 * @author    Stephen Scaff
 * @package   jumpoff/content/sect-next
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php $prevPost = get_previous_post(true);
  if($prevPost) {
   $args = array(
    'posts_per_page' => 1,
    'include' => $prevPost->ID
   );
  $prevPost = get_posts($args);
   foreach ($prevPost as $post) {
   setup_postdata($post);
 ?>
<article class="sect-nextpost center-all">
 <a href="<?php the_permalink(); ?>" style="<?php catch_that_image($page->ID, 'fullsize'); ?>"> 
 <div class="vcenter">
   <div class="content-title row">
    <div class="g-8 cols centered">
     <span class="meta-subheader">Read Next</span>
    <h2><?php the_title(); ?></h2>
    <p>By <?php the_author(); ?></p>
   </div>
   </div>
  </div>
 </a>
</article>
 <?php
  wp_reset_postdata();
 } //end foreach
 } // end if
 ?>