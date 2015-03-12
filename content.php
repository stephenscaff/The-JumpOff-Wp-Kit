<?php
/**
 * The default template for displaying the content blocks. Used for both single and index/archive/search.
 *
 * @subpackage jumpoff
 */
?>

<article id="post-<?php the_ID(); ?>">
	<a href="<?php the_permalink(); ?>">
		<div class="inner">
			<span class="post-meta-date">Posted on <?php the_time('F j, Y'); ?></span>
			<h1 class="post-title"><?php the_title(); ?></h1>
			<?php the_excerpt('...'); ?>
				
			<span class="post-more">Read More</span>
		</div>	
	</a>
</article>
             