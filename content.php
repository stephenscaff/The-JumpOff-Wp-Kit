<?php
/**
 * The default template for displaying the content blocks. Used for both single and index/archive/search.
 *
 * @subpackage jumpoff
 */
?>

	<article id="post-<?php the_ID(); ?>" class="has-table">
 	<div class="row-table">
   <section class="half has-bgimg" style="background-image:url('<?php echo catch_that_image($page->ID, 'fullsize') ?>');"></section>  
  
   <section class="half has-content">
    <div class="content">	
     <span class="post-meta"><?php the_time('F j, Y'); ?> - <?php the_author_posts_link(); ?></span>						
     <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
     <hr class="sep sep-thin sep-left"/>
        <?php the_excerpt('...'); ?>                            
     <a class="btn btn-med btn-clear " href="<?php the_permalink(); ?>">Read More</a>
    </div>
   </section>
 	</div>    
	</article>
             