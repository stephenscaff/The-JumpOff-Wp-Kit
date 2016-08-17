<?php
/**
 * Section: Pagination
 *
 * Calls pagination funciton
 *  
 *
 * @author    Stephen Scaff
 * @package   pocketprep/partials/sect-pagination
 * @version   1.0
 * @see       inc/functions/pagination.php
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php if ( function_exists('jumpoff_pagination') ) { jumpoff_pagination(); } else if ( is_paged() ) : ?>
<?php endif; ?>


