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
<article class="section-next">
 <a href="<?php the_permalink(); ?>" style="background-image: url(<?php jumpoff_ftimg_fallbacks('fullsize'); ?>)"> 
   <div class="row-xl">
    <header class="g-8 cols u-centered">
     <span class="next__subtitle">Read Next</span>
      <h2 class="next__title"><?php the_title(); ?></h2>
      <span class="next__author">By <?php the_author(); ?></span>
    </header>
   </div>
 </a>
</article>
 <?php
  wp_reset_postdata();
 } //end foreach
 } // end if
 ?>