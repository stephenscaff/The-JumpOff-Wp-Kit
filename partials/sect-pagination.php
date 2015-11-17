<?php
/**
 * Section: Pagination
 *
 * The pagination template.
 *
 * @author    Stephen Scaff
 * @package   jumpoff/content/sect-pagination
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>

<section class="sect-pagination">
 <div class="row-xl">
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