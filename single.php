<?php get_header(); ?>

<!-- Main
================================================== -->
<main role="main">

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>


<!-- Article/Post
================================================== -->
<article class="post-single">
 <div class="row">
  <div class="g-8 cols centered">	

<!-- Post: Header
================================================== -->
	 <header>
	  <span class="post-meta-date">Posted on <?php the_date(); ?></span>
	  <h1 class="post-title"><?php the_title(); ?></h1>
	 </header>

<!-- Post: content
================================================== -->
	 <section class="post-content">
		 <?php the_content(); ?>
	 </section>

	</div>
</div>
</article>


<!-- Sect: Read Next
================================================== -->
<section class="sect-next">
<?php $prevPost = get_previous_post(true);
	if($prevPost) {
		$args = array(
			'posts_per_page' => 1,
			'include' => $prevPost->ID
		);
	$prevPost = get_posts($args);
		foreach ($prevPost as $post) {
	setup_postdata($post);
?>
	<a href="<?php the_permalink(); ?>">
		<div class="row">
			<div class="g-8 cols centered">
				<small class="meta-next">Read Next</small>
				<h2><?php the_title();?></h2>
			</div>
		</div>
	</a>
				<?php
		wp_reset_postdata();
		} //end foreach
		} // end if
	?>
</section>
<?php endwhile; // End the loop ?>
</main>


<!-- Footer
================================================== -->		
<?php get_footer(); ?>