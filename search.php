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