<?php
/**
 * The template for displaying Author Archives
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
       <?php get_template_part( 'partials/post', 'author' );?>
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
        get_template_part( 'partials/content/content', 'post' );
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