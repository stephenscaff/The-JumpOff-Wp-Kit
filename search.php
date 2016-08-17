<?php
/**
 * The template for displaying Search results
 *
 *
 * @author    Stephen Scaff
 * @package   jumpoff/archive
 * @version   1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
get_header(); 

?>

<!-- Search Mast
================================================== -->
<section class="mast mast--search">
  <div class="row center-all">
    <header class="g-8 cols">
      <span class="mast__pretitle"><?php _e('Search Results for', 'jumpoff'); ?></span>
      <h3 class="mast__title"><?php echo htmlspecialchars(get_search_query()); ?></h3>
     </header>
  </div>
</section>

<!-- Section Search Results
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

<!-- Section Pagination
================================================== -->
<?php get_template_part( 'partials/posts', 'pagination' );?>

<!-- Footer
================================================== --> 
<?php get_footer(); ?>