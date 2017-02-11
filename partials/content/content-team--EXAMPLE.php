<?php
/**
* Content: content-folio
* Tempalte for displaying the work
*
* @author    Stephen Scaff
* @package   jumpoff/content/content-folio
* @version   1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}
$team_position = get_field('team_position');
$team_img = get_field('team_image');
$team_img_hover = get_field('team_image_hover')
?>
<li>
  <article class="team">
    <a class="team__link" href="<?php the_permalink(); ?>">
      <header class="team__header">
        <?php if($team_img):?><img class="team__img" src="<?php echo $team_img['sizes']['team-profile'] ?>"><?php endif; ?>
        <?php if($team_img_hover):?><img class="team__img--hover" src="<?php echo $team_img_hover['sizes']['team-profile'] ?>"><?php endif; ?>
      </header>
      <footer class="team__footer">
        <h4 class="team__name"><?php the_title(); ?></h4>
        <?php if ($team_position) :?><span class="team__position"><?php echo $team_position; ?></span><?php endif; ?>
      </footer>
    </a>
  </article>
</li>