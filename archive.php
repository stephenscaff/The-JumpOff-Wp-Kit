<?php
/**
 * The template for displaying archives
 *
 *
 * @author    Stephen Scaff
 * @package   jumpoff/archive
 * @version   1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
get_header(); ?>

<!-- Archive hero
================================================== -->
<section class="mast mast--archive">
  <div class="row u-center-all">
    <header class="g-8 cols">
      <span class="mast__pretitle">More From</span>
      <h2 class="mast__title"><?php single_cat_title( '', true ); ?></h2>
     </header>
  </div>
</section>

<!-- Section Content
================================================== -->
<section class="section-posts section--padded">
 <div class="row">
  <div class="g-8 cols u-centered">
  <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
        get_template_part( 'partials/content/content', 'posts' );
      }
    } else {
      get_template_part( 'partials/content/content', 'none' );
    }
    ?>
  </div>
 </div>
</section>


<!-- Section Pagination
================================================== -->
<?php get_template_part( 'partials/posts', 'pagination' );?>

<!-- Footer
================================================== --> 
<?php get_footer(); ?>