<?php
/**
 * The default template for displaying the content blocks. Used for both single and index/archive/search.
 *
 * @subpackage JumpOff
 */
?>

<article id="post-<?php the_ID(); ?>" class="cf">				
  <h3 class="invert"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
   <?php jumpoff_the_excerpt('...'); ?>                            
  <small class="preheader blog-meta">Posted on <?php the_time('F j, Y'); ?></small>		
</article>               
