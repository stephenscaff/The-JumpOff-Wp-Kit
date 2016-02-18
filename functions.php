<?php

/*--------------------------------------------------*/
/* Setup funciton - if so desired.
/*

function jumpoff_setup() {}
add_action('after_setup_theme', 'jumpoff_setup');
/*--------------------------------------------------*/ 

/*-----------------------------------------------*/
/* Includes: Enqueue
/*-----------------------------------------------*/
require_once('inc/functions/styles-scripts.php');
/*-----------------------------------------------*/
/* Includes: Settings
/*-----------------------------------------------*/
require_once('inc/functions/settings.php');
/*-----------------------------------------------*/
/* Includes: Theme Support
/*-----------------------------------------------*/
require_once('inc/functions/theme-support.php');
/*-----------------------------------------------*/
/* Includes: CleanUp
/*-----------------------------------------------*/
require_once('inc/functions/cleanup.php');
/*-----------------------------------------------*/
/* Includes: Admin
/*-----------------------------------------------*/
require_once('inc/functions/admin.php');
/*-----------------------------------------------*/
/* Includes: Users
/*-----------------------------------------------*/
require_once('inc/functions/users.php');
/*-----------------------------------------------*/
/* Includes: Posts
/*-----------------------------------------------*/
require_once('inc/functions/posts.php');
/*-----------------------------------------------*/
/* Includes: helpers
/*-----------------------------------------------*/
require_once('inc/functions/helpers.php');
/*-----------------------------------------------*/
/* Includes: helpers
/*-----------------------------------------------*/
require_once('inc/functions/helpers-loops.php');
/*-----------------------------------------------*/
/* Includes: Custom Fields
/*-----------------------------------------------*/
require_once('inc/customfields/custom-fields-seo.php');
/*-----------------------------------------------*/
/* Includes: Custom Post Types (CPTs) & Taxonomies
/*-----------------------------------------------*/
require_once('inc/cpts/post-types.php');
/*-----------------------------------------------*/
/* Includes: Circular Post Nav
/*-----------------------------------------------*/
require_once('inc/functions/circular-post-nav.php');
?>