<?php
/**
 * The template for displaying Archives
 *
 *
 * @author    Stephen Scaff
 * @package   jumpoff/archive
 * @version   1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<!-- Archive hero
================================================== -->
<section class="mast mast--archive">
  <header class="mast__header row g-full">
    <span class="mast__subtitle">More From</span>
    <h2 class="mast__title"><?php single_cat_title( '', true ); ?></h2>
  </header>
</section>

<section class="mast mast--archive">
  <div class="row u-center-all">
    <header class="g-8 cols">
       <?php get_template_part( 'partials/post', 'author' );?>
     </header>
  </div>
</section>

<!-- Posts
================================================== -->
<section class="posts">
 <div class="grid">
  <div class="grid__col g-8 centered">
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

<!-- Pagination
================================================== -->
<?php get_template_part( 'partials/posts', 'pagination' );?>

<!-- Footer
================================================== --> 
<?php get_footer(); ?>