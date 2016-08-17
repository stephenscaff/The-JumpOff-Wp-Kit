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
$mast_title = get_field('mast_title');
$mast_paragraph = get_field('mast_paragraph');
?>
<section class="mast mast--page" >
  <div class="grid">
    <header class="mast__header">
      <?php if ($mast_title) : ?>
        <h1 class="mast__title"><?php echo $mast_title; ?></h1>
      <?php else : ?>
        <h1 class="mast__title"><?php the_title(); ?></h1>
      <?php endif; ?>
      <?php if ($mast_paragraph) : ?>
        <p class="mast__text"><?php echo $mast_paragraph; ?></p>
      <?php endif; ?>
    </header>
  </div>
</section>

