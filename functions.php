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
/* Includes: CleanUp
/*-----------------------------------------------*/
require_once('inc/functions/cleanup.php');

/*-----------------------------------------------*/
/* Includes: Settings
/*-----------------------------------------------*/
require_once('inc/functions/settings.php');

/*-----------------------------------------------*/
/* Includes: Theme Support
/*-----------------------------------------------*/
require_once('inc/functions/theme-support.php');

/*-----------------------------------------------*/
/* Includes: Admin
/*-----------------------------------------------*/
require_once('inc/functions/admin.php');

/*-----------------------------------------------*/
/* Includes: Editor
/*-----------------------------------------------*/
require_once('inc/functions/editor.php');

/*-----------------------------------------------*/
/* Includes: Dash
/*-----------------------------------------------*/
require_once('inc/functions/dash.php');

/*-----------------------------------------------*/
/* Includes: Users
/*-----------------------------------------------*/
require_once('inc/functions/users.php');

/*-----------------------------------------------*/
/* Includes: Custom Post Types (CPTs) & Taxonomies
/*-----------------------------------------------*/
require_once('inc/functions/comments.php');

/*-----------------------------------------------*/
/* Includes: Nav
/*-----------------------------------------------*/
require_once('inc/functions/nav.php');

/*-----------------------------------------------*/
/* Includes: Posts
/*-----------------------------------------------*/
require_once('inc/functions/pagination.php');

/*-----------------------------------------------*/
/* Includes: Posts
/*-----------------------------------------------*/
require_once('inc/functions/images.php');

/*-----------------------------------------------*/
/* Includes: helpers
/*-----------------------------------------------*/
require_once('inc/functions/helpers.php');

/*-----------------------------------------------*/
/* Includes: helpers
/*-----------------------------------------------*/
require_once('inc/functions/loops.php');

/*-----------------------------------------------*/
/* Includes: Custom Fields
/*-----------------------------------------------*/
require_once('inc/customfields/custom-fields-seo.php');

/*-----------------------------------------------*/
/* Includes: Custom Post Types (CPTs) & Taxonomies
/*-----------------------------------------------*/
require_once('inc/cpts/post-types.php');

/*-----------------------------------------------*/
/* Includes: Circular Nav
/*-----------------------------------------------*/
//require_once('inc/functions/cpt-nav.php');
?>