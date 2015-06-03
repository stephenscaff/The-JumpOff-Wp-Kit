<?php get_header(); ?>


<!-- Main
================================================== -->
<main role="main">

<!-- Cover Story
================================================== -->	
<?php if ( have_posts() ) : ?>
	<?php query_posts('posts_per_page=1'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content-coverstory', get_post_format() ); ?>
	<?php endwhile; ?>
<?php endif; // end have_posts() check ?>


<!-- Sect: News / Posts
================================================== -->
	<section class="sect-posts">			
  <?php if ( have_posts() ) : ?>
    <?php query_posts('offset=1'); ?>
      <?php while ( have_posts() ) : the_post(); ?>
	    <?php get_template_part( 'content', get_post_format() ); ?>
      <?php endwhile; ?>
      <?php else : ?>
	  <?php get_template_part( 'content', 'none' ); ?>
  <?php endif; // end have_posts() check ?>
</section>

<!-- sect: Pagination
================================================== -->	
<section class="sect-pagination xl">
	<div class="row">
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('jumpoffpagination') ) { thinc_pagination(); } else if ( is_paged() ) { ?>
		<nav class="pagination">
			<ul>
				<li><a class="current" href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a class="next" href="#"><?php previous_posts_link( __( 'Older Posts &rarr;', 'jumpoff' ) ); ?></a></li>
			</ul>
		</nav>
	<?php } ?>
	</div>
</section>

</main>
<!-- Footer
================================================== -->	
<?php get_footer(); ?>