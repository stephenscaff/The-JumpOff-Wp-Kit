<?php

#bail if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 

/** 
* Run all functions throug a setup
* function jumpoff_setup() {}
* add_action('after_setup_theme', 'jumpoff_setup');
**/

# Admin: Appearance
require_once('inc/admin/admin-appearance.php');

# Admin: Dashboard
require_once('inc/admin/admin-dash.php');

# Admin: Editor
require_once('inc/admin/admin-editor.php');

# Admin: Menu Order
require_once('inc/admin/admin-menu-order.php');

# Admin: Post Order (drag and drop)
require_once('inc/admin/admin-post-order/post-order.php');

# Admin: Users
require_once('inc/admin/admin-users.php');

# Admin: Global Menu Items
//require_once('inc/admin/admin-global-menu-items.php');

# Settings: Images
require_once('inc/settings/settings-images.php');

# Settings: Theme Support
require_once('inc/settings/settings-theme-support.php');

# Settings: Permalinks
require_once('inc/settings/settings-permalinks.php');

# Enqueue/Loader Scripts and Styles
require_once('inc/functions/styles-scripts.php');

# Clean Up grimey WP stuff
require_once('inc/functions/cleanup.php');

# Custom Post Types (CPTs) & Taxonomies
require_once('inc/post-types/post-types.php');

# ACF on CPT Indexes
require_once('inc/post-types/cpt-index-fields.php');

# CPT Circular Nav
require_once('inc/post-types/cpt-nav.php');

# Comments
//require_once('inc/functions/comments.php');

# Path Helpers
require_once('inc/functions/paths.php');

# Nav Helpers
require_once('inc/functions/nav.php');

# Post Helpers
require_once('inc/functions/post-helpers.php');

# Taxonomies and Categories Helpers
require_once('inc/functions/taxonomies.php');

# Pagination
require_once('inc/functions/pagination.php');

# Image Helpers
require_once('inc/functions/images.php');

# Helpers - General Utilities
require_once('inc/functions/helpers.php');

# Dynamic Classes
require_once('inc/functions/dynamic-classes.php');

# Shortcodes
//require_once('inc/functions/shortcodes.php');

# Loops for Posts and CPTs
require_once('inc/functions/loops.php');

# ACF Module loader
require_once('inc/functions/class-acf-modules.php');