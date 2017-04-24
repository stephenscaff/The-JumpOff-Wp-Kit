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

<!-- Main --> 
<main role="main" class="">

<!-- Mast --> 
<section class="mast">
  <figure class="mast__bg"></figure>
  <header class="mast__header">
    <h1 class="mast__title"><?php the_title(); ?></h1>
    <hr class="sep-center sep--white">
  </header>
</section>

<!-- Posts -->
<?php get_template_part( 'partials/partial', 'posts' );?>

<!-- Load More -->
<?php get_template_part( 'partials/partial', 'load-more' );?>

</main>

<!-- Footer --> 
<?php get_footer(); ?>

