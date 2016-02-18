<?php
/**
 * The defualt tempalte for pages
 *
 * @author    Stephen Scaff
 * @package   page
 * @version   2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<!-- Main
================================================== --> 
<main role="main" class="bg--lightgrey section--padded">

<!-- Section: Title
================================================== --> 
<section class="title">
  <header class="content-title row">
   <div class="g-8 cols u-centered">
    <h1>Blog</h1>
   </div>
  </header>
</section>

<!-- Section Content
================================================== -->
<section class="section--padded">
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

<!-- Sect: Pagination
================================================== -->
<?php get_template_part( 'partials/posts', 'pagination' );?>

</main>

<!-- Footer
================================================== --> 
<?php get_footer(); ?>

