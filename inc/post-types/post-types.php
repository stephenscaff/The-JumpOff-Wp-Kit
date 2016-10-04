<?php
/*--------------------------------------------------*/
/*  Custom Post Types and Custom Taxonomies 
/*--------------------------------------------------*/


/*--------------------------------------------------*/
/* Flush Rewrites
/*--------------------------------------------------*/
add_action( 'after_switch_theme', 'jumpoff_flush_rewrite_rules' );

// Flush your rewrite rules
function jumpoff_flush_rewrite_rules() {
  flush_rewrite_rules();
}

/*-----------------------------------------------*/
/* Taxonomy - Post Functions
/*-----------------------------------------------*/
require_once('post-taxonomy.php');

/*-----------------------------------------------*/
/* Post Type - Work + Work Filters Taxonomy
/*-----------------------------------------------*/
//require_once('post-type-case-studies.php');
/*-----------------------------------------------*/
/* Post Type - Team
/*-----------------------------------------------*/
//require_once('post-type-team.php');

?>