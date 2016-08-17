<?php
/**
 * Section: Next Project
 *
 * @author    Stephen Scaff
 * @package   jumpoff/content/post-next
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<?php
$previous_post = get_adjacent_post(false, '', false); 
$next_post = get_adjacent_post(false, '', true);
?>

<?php if ($next_post): // if there are newer articles ?>
<section class="cta cta--alpha">
  <a class="cta__link" href="<?php echo get_permalink($next_post); ?>">
    <div class="row-xl">
      <p class="cta__text">Up Next:</p>
        <h3><?php echo get_the_title($next_post); ?></h3>
    </div>
  </a>
</section>

<?php else: ?>

<section class="cta cta--alpha">
  <a class="cta__link" href="<?php echo get_permalink($next_post); ?>">
    <div class="row-xl">
      <p class="cta__text">Up Next:</p>
        <h3>All Projects</h3>
    </div>
  </a>
</section>

<?php endif; ?>

