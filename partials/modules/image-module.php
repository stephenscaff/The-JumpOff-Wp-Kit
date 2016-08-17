<?php
/**
* IMage Module
*
* The module for adding dymanically sizes images..
*
* @author       Stephen Scaff
* @package      SandP
* @see          kit/scss/components/_auto-grid.scss
* @version      1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Vars
$imgs = 'image_repeater';
$opt_id = get_sub_field('option_id');
$opt_class = get_sub_field('option_class');

if ($imgs) : ?>
<section <?php if ($opt_id) : echo "id=$opt_id"; endif; ?> class="auto-grid <?php if ($opt_calss) : echo $opt_class; endif; ?>">
  <?php 
  while( have_rows($imgs) ): the_row(); 
  $img = get_sub_field('image'); ?>
  <img class="auto-grid__item" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>"/>
<?php endwhile; ?>
</section>
<?php endif; ?>
