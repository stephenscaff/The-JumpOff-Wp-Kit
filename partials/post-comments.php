<?php
/**
 * Post: COmments
 *
 * @author    Stephen Scaff
 * @package   jumpoff
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<!-- COMMENTS -->
<section class="comments">
  <div class="grid">
    <div class="grid__col g-6 centered">
      <?php comments_template(); ?>
    </div>
  </div>
</section>