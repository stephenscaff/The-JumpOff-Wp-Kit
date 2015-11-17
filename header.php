<?php
/**
 * The template for displaying the global header.
 *
 *  * For better organization, the actual head and header content live in partials/partial-head and partials/partial-footer
 *
 * @author    Stephen Scaff
 * @package   jumpoff/partials/partial-head
 * @version   1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php get_template_part( 'partials/partial', 'head' );?>
<?php get_template_part( 'partials/partial', 'header' );?>