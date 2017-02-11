<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly
/**
 *  Section: Next Post
 *
 *  @author     Stephen Scaff
 *  @package    partials
 *  @version    1.0
 *  @uses       cptNav::$loop_navigation_find to find first/last posts
 *  @uses       jumpoff_prev_link() which calls our cptNav class
 *  
 *              $format='%link &raquo;', 
 *              $link='%title', 
 *              $in_same_term = false, 
 *              $excluded_terms = '', 
 *              $taxonomy = 'category'
 */
if (is_post_type('resources')){
  $in_term = TRUE;
  $tax = 'resource-types';
} else{
  $in_term = FALSE;
  $tax = 'product-filters';
}
?>
<section class="pagination pagination--next">
<?php jumpoff_next_link(  '%link', '
  <div class="pagination__content">
    <span class="pagination__meta">Previous</span>
    <span class="pagination__title">%title</span>
  </div>', $in_term, '', $tax); ?>
<?php jumpoff_prev_link(  '%link', '
  <div class="pagination__content">
    <span class="pagination__meta">Next</span>
    <span class="pagination__title">%title</span>
  </div>', $in_term, 'true', $tax); ?>
</section>
 

