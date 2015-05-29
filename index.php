<?php get_header(); ?>


<!-- Main
================================================== -->
<main role="main">

<!-- Sect: Banner
================================================== -->	
<section role="banner" class="sect-banner banner-mast">
	<div id="mast-bg" class="banner-bg"></div>
  <div class="row center-all vcenter">
  	<div class="g-8 cols">
	  <h1>News & Updates</h1>
	  </div>
 </div>
</section>

<!-- Sect: News / Posts
================================================== -->
	<section class="sect-posts">			
  <?php if ( have_posts() ) : ?>
    <?php /* Start the Loop */ ?>
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
	<?php if ( function_exists('jumpoff_pagination') ) { jumpoff_pagination(); } else if ( is_paged() ) { ?>
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

<!-- Footer
================================================== -->	
<?php get_footer(); ?>