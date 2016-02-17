
<?php
/**
 * Post: Author
 *
 * @author    Stephen Scaff
 * @package   jumpoff/partials/post-author
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php if (is_author()) : // is Author Archive Page  ?>

  <?php if (get_the_author_meta('avatar')) : ?>
  <figure class="author__avatar--large">
    <img src="<?php the_author_meta('avatar'); ?>" alt="<?php the_author_meta( 'user_nicename' ); ?>">
  </figure>
  <?php endif; ?>
  <div class="author__info">
    <?php if (get_the_author_meta('display_name')) : ?>
      <h1 class="author__name"><?php the_author_meta('display_name'); ?></h1>
    <?php endif; ?>
    <?php if (get_the_author_meta('position')) : ?>
      <h4 class="author__title"><?php the_author_meta('position'); ?></h4>
    <?php endif; ?>
    <?php if (get_the_author_meta('description')) : ?>
      <p><?php the_author_meta('description'); ?></p>
    <?php endif; ?>
    <?php if (get_the_author_meta('user_email')) : ?>
      <a class="author__more" href="mailto:<?php the_author_meta('user_email'); ?>"><i class="icon-mail"></i> Email <?php the_author_meta('first_name'); ?></a>
    <?php endif; ?>
    <?php if (get_the_author_meta('twitter')) : ?>
      <a class="author__more" href="<?php the_author_meta('twitter'); ?>"><i class="icon-twitter"></i> Follow <?php the_author_meta('first_name'); ?></a>
    <?php endif; ?>
  </div>

<?php elseif (is_single()) : // is Single Posts ?>

  <?php if(get_the_author_meta('avatar') ): ?>
    <figure class="author__avatar">
      <img src="<?php the_author_meta('avatar'); ?>" alt="<?php the_author_meta( 'user_nicename'); ?>">
    </figure>
  <?php endif; ?>
  <div class="author__info">
    <?php if (get_the_author_meta('user_nicename')) : ?>
    	<span class="author__credit">Written By</span>
    	<h4 class="author__name"><?php the_author_posts_link(); ?></h4><?php endif; ?>
    <?php if (get_the_author_meta('position')) : ?>
      <h6 class="author__title"><?php the_author_meta('position'); ?></h6>
    <?php endif; ?>
    <?php if (get_the_author_meta('description')) : ?>
      <p class="author__byline"><?php the_author_meta('description'); ?></p>
    <?php endif; ?>
    <?php if (get_the_author_meta('user_email')) : ?>
      <a class="author__more" href="mailto:<?php the_author_meta('user_email'); ?>"><i class="icon-mail"></i> Email <?php the_author_meta('first_name'); ?></a>
    <?php endif; ?>
    <?php if (get_the_author_meta('twitter')) : ?>
      <a class="author__more" href="<?php the_author_meta('twitter'); ?>"><i class="icon-twitter"></i> Follow <?php the_author_meta('first_name'); ?></a>
    <?php endif; ?>
  </div>

<?php endif; ?>