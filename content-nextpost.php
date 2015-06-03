<section class="sect-nextpost nav-nextpost">
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
	<article>
		<a href="<?php the_permalink(); ?>" class="link-trans" style="background-image: url(<?php echo catch_that_image() ?>)">
			<div class="vcenter">
				<div class="content">
				<span class="post-meta-next">Read Next</span>
				<hr class="sep"/>
				<h2><?php the_title();?></h2>
				<?php if(get_field('post-subtitle')) { echo '<p>' . get_field('post-subtitle') . '</p>';} ?>
			</div>
		</div>
		</a>
	</article>
	<?php
		wp_reset_postdata();
	} //end foreach
	} // end if
	?>
</section>
