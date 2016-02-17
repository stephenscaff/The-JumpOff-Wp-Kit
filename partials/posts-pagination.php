<?php
/**
 * Section: Pagination
 *
 * Used for listing blog posts
 *
 * @author    Stephen Scaff
 * @package   pocketprep/partials/sect-pagination
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>

<section class="section-pagination section--padded">
<div class="pagination row">
 <div class="g-8 cols  u-centered">
  <?php if ( function_exists('jumpoff_pagination') ) { jumpoff_pagination(); } else if ( is_paged() ) : ?>
    <ul class="pagination__list">
     <li><a class="pagination__previous" href="#"><?php previous_posts_link( __( 'Older Posts &rarr;', 'jumpoff' ) ); ?></a></li>
     <li><a class="pagination__next" href="#"><?php next_posts_link( __( 'Newer Posts &rarr;', 'jumpoff' ) ); ?></a></li>
    </ul>
  <?php endif; ?>
  </div>
 </div>
</section>


