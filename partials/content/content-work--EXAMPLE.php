<?php
/**
* Content: content-folio
* Tempalte for displaying the work
*
* @author    Stephen Scaff
* @package   jumpoff/content/content-work
* @version   1.0
*/

if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}

$folio_subtitle = get_field('work_mast_intro');

?>
<article class="folio  mix <?php jumpoff_tax_unlinked('work-filters'); ?>">
  <a class="folio__link" href="<?php the_permalink(); ?>">
    <figure class="folio__bg" href="#" style="background-image:url('<?php jumpoff_ftimg_fallbacks('large'); ?>')"></figure>
    <header class="folio__header">
      <h1 class="folio__title"><?php the_title(); ?></h1>
      <?php if ($folio_subtitle) : ?><span class="folio__subtitle"><?php echo $folio_subtitle; ?></span><?php endif; ?>
    </header>
    <footer class="folio__footer">
      <span class="btn-view btn--white">See The Work</span>
    </footer>
  </a>
</article>

