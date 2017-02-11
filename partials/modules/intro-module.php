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
$text = get_sub_field('text');
$btn = get_sub_field('btn');
$btn_link = get_sub_field('btn_link');
$bg = '';

?>

<!-- Intro -->
<?php if ($title) : ?>
<section class="intro  <?php if ($bg ) : ?>has-bg<?php endif; if(strlen($title) > 18) : ?>intro--wide<?php endif; ?>">
  <?php if ($bg ) : ?>
    <figure class="intro__bg" style="background-image: url(<?php echo $img['url']; ?>);"></figure>
  <?php endif; ?>
  <div class="grid">
    <header class="intro__header">
      <h2 class="intro__title"><?php echo $title; ?></h2>
    </header>
    <div class="intro__content">
      <?php echo $text; ?>
      <?php if ($btn) : ?>
      <a class="btn-line btn--beta" href="<?php echo $btn_link; ?>"><?php echo $btn; ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>