<?php
/**
* Content: content-Posts
*
* @author    Stephen Scaff
* @package   jumpoff/content/content-posts
* @version   1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}
$postImg = catch_that_image();

$mastImg = get_field('masthead_image');
$mastImgsize = 'medium'; // (get large size)
$image_array = wp_get_attachment_image_src($mastImg, $mastImgsize);
// finally, extract and store the URL from $image_array
$image_url = $image_array[0];

?>
<!-- Article <?php the_ID(); ?> -->
<article class="post mix <?php jumpoff_unlinked_cats(); ?>">
 <a href="<?php the_permalink(); ?>">
  <figure class="post-img">
   <i class="preloader"></i>
   <img src="<?php echo $image_url ?>" onload="imgLoaded(this)"/>
  </figure>
  <div class="post-content">
   <h4><?php the_title(); ?></h4>
   <span class="meta-date"><?php the_time('F j, Y'); ?></span>
   <?php the_excerpt('...'); ?>
   <span class="link-more">Read More</span>
  </div>
 </a>
</article>



