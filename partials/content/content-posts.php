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
    <figure class="post__figure has-preloader">
      <span class="preloader"></span>
      <img class="post__img" src="<?php jumpoff_ft_img('large'); ?>" onload="imgLoaded(this)"/>
    </figure>
    <div class="post__content">
      <span class="post__date"><?php the_time('m/d/y'); ?></span>
      <h2 class="post__title"><?php the_title(); ?></h2>
      <p class="post__excerpt"><?php echo jumpoff_excerpt(200); ?></p>
      <span class="btn-view btn--alpha">Read</span>
    </div>
  </a>
</article>