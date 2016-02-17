<?php
/**
* Content: None
*
* @author    Stephen Scaff
* @package   jumpoff/content/content-none
* @version   1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}
?>

<article class="post-none">    
 <?php if (is_search()) : ?>
  <section class="section-search section--padded">
   <h4>Sorry, no posts found</h4>
   <p>Do another search?</p>                       
   <?php get_template_part( 'partials/search', 'form' ); ?>
  <?php endif; ?>
 </section>
</article>   
