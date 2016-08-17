<?php
/**
 * Template for iconv(in_charset, out_charset, str)                                                                                                                       n
 *
 * @author    Stephen Scaff
 * @package   page
 * @version   2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<!-- Main
================================================== --> 
<main role="main" class="">

<!-- Mast
================================================== --> 
<section class="mast">
  <figure class="mast__bg"></figure>
  <header class="mast__header">
    <h1 class="mast__title"><?php the_title(); ?></h1>
    <hr class="sep-center sep--white">
  </header>
</section>

<!-- Section Content
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

<!-- Sect: Pagination
================================================== -->
<?php get_template_part( 'partials/partial', 'pagination' );?>

</main>

<!-- Footer
================================================== --> 
<?php get_footer(); ?>

