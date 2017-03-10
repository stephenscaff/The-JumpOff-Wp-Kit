<?php
/**
 * Partial:Posts
 *
 * Outputs default posts loop
 *
 * @author    Stephen Scaff
 * @package   jumpoff/content/posts-related
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<section class="posts">
 <div class="grid">
  <div class="grid__col g-8 centered">
  <?php
    if ( have_posts() ): while ( have_posts() ) : the_post();
      get_template_part( 'partials/content/content', 'posts' );
    endwhile; else: 
      get_template_part( 'partials/content/content', 'none' );
    endif;
    ?>
  </div>
 </div>
</section>