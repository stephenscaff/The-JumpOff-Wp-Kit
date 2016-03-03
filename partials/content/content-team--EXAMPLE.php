<?php
/**
 * Content: team
 *
 * Example of the repeatable content for a Team CPT, using ACF fields
 *
 * @author    Stephen Scaff
 * @package   jumpoff/content/content-team
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
//ACF Vars
$team_name = get_field('team_name');
$team_position = get_field('team_position');
$team_img = get_field('team_image');
?>
<!-- Article <?php the_ID(); ?> -->
<article class="team">
  <a href="<?php the_permalink(); ?>">
  <img class="team__img" src="<?php echo $team_img; ?>">
  <div class="team__content">
    <h5><?php echo $team_name; ?></h5>
    <span class="team__position"><?php echo $team_position; ?></span>
  </div>
  </a>
</article>


