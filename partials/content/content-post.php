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
?>
<article class="post">
 <a class="post__link" href="<?php the_permalink(); ?>">
  <div class="post__content">
  <span class="post__date"><?php the_time('F j, Y'); ?></span>
   <h3 class="post__title"><?php the_title(); ?></h3>
   <p class="post__excerpt">
    <?php echo jumpoff_excerpt(200); ?>
   </p>
   <span class="post__more">Read More</span>
  </div>
 </a>
</article>




