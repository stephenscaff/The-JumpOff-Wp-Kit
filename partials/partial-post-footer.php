<?php
/**
 * Post Footer
 *
 * The Partial for Post Footers, used on blogposts and the mondalite post type.
 *
 * @author    Stephen Scaff
 * @package   Jumpoff
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<footer class="post-footer">
  <div class="grid">
    <div class="grid__col g-6 centered">
      <!-- Post Cats -->
      <aside class="post-cats">
        <span class="post-cats__title">Posted In : </span>
        <span class="post-cats__item"><?php the_category('</span><span class="post-cats__item">'); ?></span>
      </aside>

      <!-- Post Shares -->
      <aside class="post-shares">
        <span class="post-shares__title">Share</span>
        <a class="post-shares__link" href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>+<?php the_permalink(); ?>">Twitter</a>
        <a class="post-shares__link" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>/&amp;title=<?php the_title(); ?>">Facebook</a>
      </aside>

      <aside class="post-byline">
        <span class="post-byline__meta">Author</span>
        <span class="post-byline__author"><?php the_author_meta('display_name'); ?></span>
        <?php if (get_the_author_meta('description')) : ?>
          <p class="post-byline__bio"><?php the_author_meta('description'); ?></p>
        <?php endif; ?>
        <a class="post-byline__author-link" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">View All Posts</a>
      </aside>
    </div>
  </div>
</footer>