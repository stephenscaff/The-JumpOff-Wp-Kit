<?php
/**
* intro-module
*
* The module for creating Intro Sections
*
* @author       Stephen Scaff
* @package      SandP
* @see          kit/scss/components/_intros.scss
* @version      1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//vars 
$title = get_sub_field('title'); 
$subtitle = get_sub_field('subtitle'); 
$text = get_sub_field('text');
$pretitle = get_sub_field('cairo_pattern_set_filter(pattern, filter)');
$intro_left = get_sub_field('intro_left');
$opt_id = get_sub_field('option_id');
$opt_class = get_sub_field('option_class');
?>

<?php if ($intro_left) : ?>
<!-- INTRO -->
<section <?php if ($opt_id) : echo "id=$opt_id"; endif; ?> class="intro intro--left <?php if ($opt_class) : echo $opt_class; endif; ?>">
  <div class="grid">
    <header class="intro__header grid__col g-4">
      <?php if ($pretitle) : ?><span class="preheader"><?php echo $pretitle; ?></span><?php endif; ?>
      <h3 class="intro__title"><?php echo $title; ?></h3>
      <hr class="sep"/>
    </header>
    <div class="intro__content grid__col g-8">
      <p><?php echo $text; ?></p>
    </div>
  </div>
</section>

<?php else : ?>

<!-- INTRO -->
<section <?php if ($opt_id) : echo "id=$opt_id"; endif; ?> class="intro <?php if ($opt_id) : echo $opt_class; endif; ?>">
  <header class="intro__header grid">
    <?php if ($preheader) : ?>
    <span class="intro__pretitle"><?php echo $pretitle; ?></span>
    <?php endif; ?>
    <h3 class="intro__title"><?php echo $title; ?></h3>
    <hr class="sep-center sep--dark">
    <?php if ($subtitle) : ?><h4 class="intro__subtitle"><?php echo $subtitle; ?></h4><?php endif; ?>
    <p class="intro__text"><?php echo $text; ?></p>
  </header>
</section>

<?php endif; ?>