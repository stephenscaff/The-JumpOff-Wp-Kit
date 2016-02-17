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
<main role="main">

<!-- Section: Title
================================================== --> 
<section class="mast">
  <div class="row">
    <header class="mast__header  g-8 cols u-centered">
      <h1><?php the_title(); ?></h1>
    </header>
  </div>
</section>

<!-- Section Content
================================================== -->
<section class="section--padded">
 <div class="row">
  <div class="g-8 cols u-centered">
  <?php 
   while (have_posts()) : the_post();
    the_content();
   endwhile; // End content loop ?>
  </div>
 </div>
</section>
</main>

<!-- Footer
================================================== --> 
<?php get_footer(); ?>
