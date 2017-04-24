<?php
/**
* Content: None
*
* @author    Stephen Scaff
* @package   partials/content
* @version   1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<section class="no-results"> 
  <div class="grid">
    <div class="no-results__content">
    <?php if (is_search()) : ?>
      <h4 class="no-results__title">Sorry.</h4>
      <p>Your search returned no results</p>
    <?php else : ?>
      <h4 class="no-results__title">Sorry.</h4>
      <p>No content found.</p>
    <?php endif; ?>
    </div>
  </div>
</section>