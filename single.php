<?php
/**
* The default template for single blog posts.
*
* @author    Stephen Scaff
* @package   jumpoff
* @version   1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); 

?>

<!-- MAIN-->
<main role="main">

<?php while (have_posts()) : the_post(); ?>

<article>

<!-- MAST -->
<?php get_template_part( 'partials/partial', 'post-header' );?>

<!-- POST CONTENT -->
<section class="post-content content">
  <div class="grid-sm">
      <?php the_content(); ?>
  </div>
</section>

<!-- POST FOOTER -->
<?php get_template_part( 'partials/partial', 'post-footer' );?>

</article>

<?php endwhile; ?>

<!-- COMMENTS -->
<?php //get_template_part( 'partials/partial', 'comments' );?>

<!-- NEXT -->
<?php get_template_part( 'partials/partial', 'next' );?>

</main>

<!-- FOOTER -->    
<?php get_footer(); ?>