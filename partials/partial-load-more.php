<?php
/**
 * Partial Load More
 *
 * Calls the load more ajax function
 *  
 *
 * @author    Stephen Scaff
 * @package   partials
 * @version   1.0
 * @see       inc/load-more (for js, css and php)
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<section class="load-more">
  <div class="grid">
    <a id="js-load-more" class="load-more__link" href="#">
      <span class="btn-line">More Posts</span>
      <span class="load-more__preloader"><span class="preloader preloader--load-more"></span></span>
    </a>
  </div>
</section>