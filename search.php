<?php get_header(); ?>

<section class="sect-searchreturn sect-content">
	<div class="row">
	
	<!-- Row for main content area -->
	<div class="g-8 cols" role="main">
	
		<h2><?php _e('Search Results for', 'jumpoff'); ?> "<?php echo htmlspecialchars(get_search_query()); ?>"</h2>
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content/content-posts', get_post_format() ); ?>
		<?php endwhile; ?>
		
		<?php else : ?>
			<?php get_template_part( 'content/content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('jumpoff_pagination') ) { jumpoff_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'jumpoff' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'jumpoff' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
		
<?php get_footer(); ?>



<?php
/**
 * The template for displaying archives
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
      <span class="mast__pretitle">More From</span>
      <h3 class="mast__title"><?php _e('Search Results for', 'redfin'); ?> <strong>"<?php echo htmlspecialchars(get_search_query()); ?>"</strong></h3>
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
        get_template_part( 'partials/content/content', 'posts' );
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