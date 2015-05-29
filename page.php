<?php get_header(); ?>

<!-- Main
================================================== -->
<main role="main">
<section class="sect-content">
	<div class="row">
	  <div class="8 cols centered">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="post-title"><?php the_title(); ?></h1>
			</header>

				<?php the_content(); ?>


		</article>
	<?php endwhile; // End the loop ?>

	</div>
</div>
</section>
</main>	
<?php get_footer(); ?>