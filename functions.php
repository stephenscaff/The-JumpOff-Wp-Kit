<?php

/*--------------------------------------------------*/
/* Setup funciton - if so desired.
/*

function jumpoff_setup() {}
add_action('after_setup_theme', 'jumpoff_setup');
/*--------------------------------------------------*/ 

/*-----------------------------------------------*/
/* Admin: Appearance
/*-----------------------------------------------*/
require_once('inc/admin/admin-appearance.php');

/*-----------------------------------------------*/
/* Admin: Dashboard
/*-----------------------------------------------*/
require_once('inc/admin/admin-dash.php');

/*-----------------------------------------------*/
/* Admin: Editor
/*-----------------------------------------------*/
require_once('inc/admin/admin-editor.php');

/*-----------------------------------------------*/
/* Admin: Post Order (drag and drop)
/*-----------------------------------------------*/
require_once('inc/admin/admin-post-order/post-order.php');

/*-----------------------------------------------*/
/* Admin: Users
/*-----------------------------------------------*/
require_once('inc/admin/admin-users.php');

/*-----------------------------------------------*/
/* Enqueue/Loader Scripts and Styles
/*-----------------------------------------------*/
require_once('inc/functions/styles-scripts.php');

/*-----------------------------------------------*/
/* Clean Up grimey WP stuff
/*-----------------------------------------------*/
require_once('inc/functions/cleanup.php');

/*-----------------------------------------------*/
/* Site and Theme Settings
/*-----------------------------------------------*/
require_once('inc/functions/settings.php');

/*-----------------------------------------------*/
/* Register Theme Supports
/*-----------------------------------------------*/
require_once('inc/functions/theme-support.php');

/*-----------------------------------------------*/
/* Custom Post Types (CPTs) & Taxonomies
/*-----------------------------------------------*/
require_once('inc/post-types/post-types.php');

/*-----------------------------------------------*/
/* ACF on CPT Indexes
/*-----------------------------------------------*/
require_once('inc/post-types/cpt-for-acf.php');

/*-----------------------------------------------*/
/* CPT Circular Nav
/*-----------------------------------------------*/
//require_once('inc/post-types/cpt-nav.php');

/*-----------------------------------------------*/
/* Comments
/*-----------------------------------------------*/
//require_once('inc/functions/comments.php');

/*-----------------------------------------------*/
/* Path Helpers
/*-----------------------------------------------*/
require_once('inc/functions/paths.php');
/*-----------------------------------------------*/
/* Nav Helpers
/*-----------------------------------------------*/
require_once('inc/functions/nav.php');

/*-----------------------------------------------*/
/* Post Helpers
/*-----------------------------------------------*/
require_once('inc/functions/post-helpers.php');

/*-----------------------------------------------*/
/* Taxonomies and Categories Helpers
/*-----------------------------------------------*/
require_once('inc/functions/taxonomies.php');

/*-----------------------------------------------*/
/* Pagination
/*-----------------------------------------------*/
require_once('inc/functions/pagination.php');

/*-----------------------------------------------*/
/* Image Helpers
/*-----------------------------------------------*/
require_once('inc/functions/images.php');

/*-----------------------------------------------*/
/* Helpers - General Utilities
/*-----------------------------------------------*/
require_once('inc/functions/helpers.php');

/*-----------------------------------------------*/
/* Dynamic Classes
/*-----------------------------------------------*/
require_once('inc/functions/dynamic-classes.php');

/*-----------------------------------------------*/
/* Shortcodes
/*-----------------------------------------------*/
require_once('inc/functions/shortcodes.php');

/*-----------------------------------------------*/
/* Loops for Posts and CPTs
/*-----------------------------------------------*/
require_once('inc/functions/loops.php');

/*-----------------------------------------------*/
/* ACF Module loader
/*-----------------------------------------------*/
require_once('inc/functions/class-acf-modules.php');


?>