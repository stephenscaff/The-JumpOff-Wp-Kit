<?php
/*--------------------------------------------------*/
/*  Custom Post Types and Custom Taxonomies 
/*  01. Flush Rewrites
/*  02: Taxonomy  - Post Functions
/*  03: Post Type - Work
/*  04: Post Type - Team
/*  05: Post Type - Jobs
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
require_once('post-taxonomy-post-functions.php');
/*-----------------------------------------------*/
/* Post Type - Work + Work Filters Taxonomy
/*-----------------------------------------------*/
//require_once('post-type-work.php');
/*-----------------------------------------------*/
/* Post Type - Team
/*-----------------------------------------------*/
//require_once('post-type-team.php');

?>