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

<!-- Sect: Title
================================================== --> 
<section class="sect-title center-all">
  <header class="content-title row">
   <div class="g-8 cols centered">
    <h1><?php the_title(); ?></h1>
   </div>
  </header>
</section>

<!-- Page Content
================================================== -->
<section class="sect-content post-content ">
 <div class="row">
  <?php 
   while (have_posts()) : the_post();
    the_content();
   endwhile; // End content loop ?>
 </div>
</section>
</main>

<!-- Footer
================================================== --> 
<?php get_footer(); ?>
