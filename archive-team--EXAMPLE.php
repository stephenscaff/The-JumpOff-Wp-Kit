<?php
/**
 * The Template for displaying the archive/index for the "Team" Custom Post Type (example)
 *
 * @author    Stephen Scaff
 * @package   jumpoff/archive-team
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();
?>

<!-- Sect: Team
================================================== --> 
<section id="sect-team" class="sect-team sect-content js-fade">
  <header class="row content-title">
    <div class="g-8 cols">  
      <h2>The Team</h2>
      <p></p>
    </div>
  </header>

  <div class="row-xl">
    <div class="grid-team">
      <?php $args = array(
     'posts_per_page'   => 12,
     'offset'           => 0,
     'post_type'        => 'team',
     'orderby'          => 'date',
     'order'            => 'DESC'
   );

   $team = get_posts( $args );
    foreach ( $team as $post ) : setup_postdata( $post ); 
      get_template_part( 'partials/content/content', 'team' );
   
    endforeach;
  wp_reset_query(); 
    ?>
    </div>
  </div>
</section>


<!-- Footer
================================================== --> 
<?php get_footer(); ?>