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
  <div class="search-form__group input-group">
    <input id="s" class="search-form__input input-group" name="s" type="text" placeholder="<?php esc_attr_e('Search something buddy', 'jumpoff'); ?>">
    <button id="searchsubmit" class="search-form__btn input-group__btn btn--submit" type="submit" aria-label="Submit" title="Submit">
      <i class="icon-search"></i>
    </button>
  </div>
</form>