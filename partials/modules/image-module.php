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

if ($imgs) : ?>
<section class="auto-grid">
<?php while( have_rows($imgs) ): the_row(); 
  $img = get_sub_field('image'); ?>
  <img class="auto-grid__item" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>"/>
<?php endwhile; ?>
</section>
<?php endif; ?>
