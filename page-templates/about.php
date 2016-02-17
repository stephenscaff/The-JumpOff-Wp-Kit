<?php
/*
Template Name: About
*/
get_header(); ?>



<!-- Main
================================================== --> 
<main role="main">

<!-- Section: Title
================================================== --> 
<section class="title">
  <header class="content-title row">
   <div class="g-8 cols u-centered">
    <h1><?php the_title(); ?></h1>
   </div>
  </header>
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
