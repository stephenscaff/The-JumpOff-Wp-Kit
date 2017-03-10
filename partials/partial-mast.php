<?php
/**
 *  Partial: partials/partial-mast
 *
 *  Template for displaying a mast sections with ACFs
 *
 *  @author    Stephen Scaff
 *  @package   jumpoff/partials/partial-products
 *  @version    1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//vars
$id = jumpoff_ids();
$class = jumpoff_mod_class();
$mast_title = get_field('mast_title', $id);
$mast_text = get_field('mast_text', $id);
$mast_bg = get_field('mast_bg', $id);
$mast_icon = get_field('icons');
?>

<section class="mast mast--<?php echo $class ?>">
  <?php if ($mast_bg) : ?>
    <figure class="mast__bg js-parallax" style="background-image:url(<?php echo $mast_bg['url'] ?>)"></figure>
  <?php else : ?>
    <figure class="mast__bg js-parallax" style="background-image:url(<?php echo jumpoff_ft_img('full'); ?>)"></figure>
  <?php endif; ?>
  <div class="grid">
    <div class="mast__content">
    <?php if ($mast_title) : ?>
      <h1 class="mast__title"><?php echo $mast_title; ?></h1>
    <?php elseif (is_tax()) : ?>
      <h1 class="mast__title"><?php single_cat_title('', true); ?>s</h1>
    <?php else : ?>
      <h1 class="mast__title"><?php the_title(); ?></h1>
    <?php endif; if ($mast_text) : ?>
      <p class="mast__text"><?php echo $mast_text; ?></p>
    <?php endif; ?>  
    </div>
  </div>
</section>
