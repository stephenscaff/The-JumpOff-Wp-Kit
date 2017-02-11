<?php
/**
 * Template for general posts archives.                                                                                                               n
 *
 * @author    Stephen Scaff
 * @package   page
 * @version   2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<!-- MAIN --> 
<main role="main" class="">

<!-- MAST -->
<?php get_template_part( 'partials/partial', 'mast' );?>

<!-- POSTS -->
<section class="posts pad bg-lightgrey">
  <div class="grid-xl">
    <div class="posts__grid">
      <?php
    if ( have_posts() ): while ( have_posts() ) : the_post();
      get_template_part( 'partials/content/content', 'posts' );
    endwhile; else: 
      get_template_part( 'partials/content/content', 'none' );
    endif;
    ?>
    </div>
  </div>
</section>

<!-- Pagination -->
<?php get_template_part( 'partials/posts', 'pagination' );?>

</main>

<!-- Footer  --> 
<?php get_footer(); ?>