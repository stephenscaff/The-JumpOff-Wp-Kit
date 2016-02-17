<?php
/**
* The default template for single blog posts.
*
* @author    Urban Influence
* @package   jumpoff/single
* @version   1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); 
$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false );
?>

<!-- Main
================================================== -->
<main role="main">

<?php while (have_posts()) : the_post(); ?>

<article>
<!-- Post Mast
================================================== -->
<section class="post-mast section--padded" <?php if ($post_thumbnail) : ?> style="background-image:url('<?php echo $post_thumbnail[0]; ?>');" <?php endif; ?>>
 <div class="row-xl">
  <header class="mast__header g-8 cols u-centered">
    <span class="mast__date"><?php the_time('F j, Y'); ?></span>
   <h1 class="mast__title"><?php the_title(); ?></h1>
   <span class="mast__author">by <?php the_author_posts_link(); ?></span>
  </header>
 </div>
</section>

<!-- Post Content
================================================== -->
<section class="post-content section--padded">
 <div class="row-xl">
  <div class="g-8 cols u-centered">
   <?php the_content(); ?>
  </div>
 </div>
</section>

<!-- Post Footer
================================================== -->
<footer class="post-footer">
  <div class="row-xl">
    <div class="g-8 cols u-centered">
      <!-- Post Footer: Tags --> 
      <ul class="post-tags"><?php the_tags('</li><li>'); ?></li></ul>

      <!-- Post Footer: Author --> 
      <section class="section-author post-author">
        <?php get_template_part( 'partials/post', 'author' );?>
      </section>
    </div>
  </div>
</footer>
</article>
<?php endwhile; ?>



<!-- Post Footer
================================================== -->

<?php get_template_part( 'partials/post', 'next' );?>

</main>


<!-- Footer
================================================== -->    
<?php get_footer(); ?>