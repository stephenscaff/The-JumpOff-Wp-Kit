<?php
/**
* content-module
*
* The module for creating content (headers, paragraphs, blockquotes, etc) regions.
*
* @author       Stephen Scaff
* @package      SandP
* @see          kit/scss/components/_content.scss
* @version      1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$content = get_sub_field('content'); 
$content_2 = get_sub_field('content_2'); 
$opt_id = get_sub_field('option_id');
$opt_class = get_sub_field('option_class');
?>

<?php if ($content_2) : ?>
<!-- CONTENT -->
<section <?php if ($opt_id) : echo "id=$opt_id"; endif; ?> class="content pad <?php if ($opt_class) : echo $opt_class; endif; ?>>">
  <div class="grid">
    <div class="grid__col g-6">
    <?php echo $content; ?>
    </div>
    <div class="grid__col g-6">
    <?php echo $content_2; ?>
    </div>
  </div>
</section>

<?php else : ?>

<!-- CONTENT -->
<section <?php if ($opt_id) : echo "id=$opt_id"; endif; ?> class="content pad <?php if ($opt_class) : echo $opt_class; endif; ?>">
  <div class="grid-sm">
    <?php echo $content; ?>
  </div>
</section>

<?php endif; ?>