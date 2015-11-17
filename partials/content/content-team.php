<?php
/**
 * Content: team
 *
 * Example of a Team CPT
 *
 * @author    Stephen Scaff
 * @package   jumpoff/content/content-team
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
$teamName = get_field('team_name');
$teamPosition = get_field('team_position');
$teamImg = get_field('team_image');
?>
<!-- Article <?php the_ID(); ?> -->
<article>
  <a href="<?php the_permalink(); ?>">
  <img src="<?php echo $teamImg; ?>">
  <div class="content">
    <h5><?php echo $teamName; ?></h5>
    <span class="team-position"><?php echo $teamPosition; ?></span>
  </div>
  </a>
</article>


