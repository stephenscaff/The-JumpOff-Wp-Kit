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
   <h1 class="post__title"><?php the_title(); ?></h1>
   <p class="post__excerpt">Chester Tester
   </p>
   <span class="post__more">Read More</span>
  </div>
 </a>
</article>




