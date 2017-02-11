<?php
/**
 * Flush Rewrites
 */
add_action( 'after_switch_theme', 'jumpoff_flush_rewrite_rules' );

// Flush your rewrite rules
function jumpoff_flush_rewrite_rules() {
  flush_rewrite_rules();
}

/**
 * Taxonomies
 */
require_once('post-taxonomy.php');
/**
 * Post Type
 */
//require_once('post-type-ex.php');


?>