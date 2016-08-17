<?php
/**
 * Search Form 
 *
 * Displays search form
 *
 * @author    Stephen Scaff
 * @package   jumpoff/partials/search-form
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<form id="searchform" role="search" class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="input-group">
 <input id="s" class="input-group__input input--search" name="s" type="text" placeholder="<?php esc_attr_e('Search something buddy', 'jumpoff'); ?>">
  <button id="searchsubmit" class="input-group__btn btn--submit" type="submit" aria-label="Submit" title="Submit">
    <i class="icon-search"></i>
  </button>
 </div>
</form>