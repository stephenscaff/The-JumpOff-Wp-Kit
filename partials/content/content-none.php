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

<section class="no-results"> 
  <div class="grid">
  <?php if (is_search()) : ?>
    <h4>Sorry.</h4>
    <p>Your search returned no results</p>
  <?php else : ?>
  <h4>Sorry.</h4>
  <p>No content found.</p>
    <?php endif; ?>
  </div>
</section>