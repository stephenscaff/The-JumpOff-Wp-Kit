
<?php
/**
 * Template for author posts archives.                                                                                                               n
 *
 * @author    Stephen Scaff
 * @package   page
 * @version   2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<!-- MAIN --> 
<main role="main" class="">

<section class="mast mast--author">
  <div class="grid">
  <div class="mast__content">
      <h1 class="mast__title"><?php the_author_meta('display_name'); ?></h1>
      <?php if (get_the_author_meta('description')) : ?>
      <p><?php the_author_meta('description'); ?></p>
    <?php endif; ?>
  </div>
  </div>
</section>

<!-- Breadcrumbs -->
<?php get_template_part( 'partials/partial', 'breadcrumbs' );?>

<!-- POSTS -->
<section class="posts pad bg-lightgrey">
  <div class="grid-xl">
    <div class="posts__grid">
      <?php
    if ( have_posts() ): while ( have_posts() ) : the_post();
      get_template_part( 'partials/content/content', 'post' );
    endwhile; else: 
      get_template_part( 'partials/content/content', 'none' );
    endif;
    ?>
    </div>
  </div>
</section>

<!-- Pagination -->
<?php get_template_part( 'partials/partial', 'pagination' );?>

</main>

<!-- Footer  --> 
<?php get_footer(); ?>