<?php
/**
* image-slider-module
*
* The module for creating Image Sliders
*
* @author       Stephen Scaff
* @package      SandP
* @see          kit/scss/components/_sliders.scss
* @version      1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//vars 
$img_slider = 'images_repeater';
$opt_id = get_sub_field('option_id');
$opt_class = get_sub_field('option_class');
?>

<!-- IMAGE SLIDER -->
<section <?php if ($opt_id) : echo "id=$opt_id"; endif; ?> class="slider slider--imgs slider--dotsontop <?php if ($opt_clsas) : echo $opt_class; endif; ?>">
  <div class="grid-wrap">
    <div class="js-slider-imgs">
<?php while( have_rows($img_slider) ): the_row(); 
$img = get_sub_field('image'); ?>
      <figure class="slider__item">
        <img class="slider__img" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>"/>
      </figure>
<?php endwhile; ?>
    </div>
  </div>
</section>