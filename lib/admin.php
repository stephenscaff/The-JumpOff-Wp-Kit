<?php

/*-----------------------------------------------*/
/*	Remove FrontEnd Admin bar
/*-----------------------------------------------*/

add_filter('show_admin_bar', '__return_false');  


/*-----------------------------------------------*/
/*	Remove Visual Editor form Admin
/*-----------------------------------------------*/
add_filter ( 'user_can_richedit' , create_function ( '$a' , 'return false;' ) , 50 );

/*-----------------------------------------------*/
/*	Create new Role for: Client
/*-----------------------------------------------
$result = add_role( 'client', __(
 
'Client' ),
 
array(
'read' => true, // true allows this capability
'edit_posts' => false, // Allows user to edit their own posts
'edit_pages' => false, // Allows user to edit pages
'edit_others_posts' => false, // Allows user to edit others posts not just their own
'create_posts' => false, // Allows user to create new posts
'manage_categories' => false, // Allows user to manage post categories
'publish_posts' => false, // Allows the user to publish, otherwise posts stays in draft mode
'edit_themes' => false, // false denies this capability. User can’t edit your theme
'install_plugins' => false, // User cant add new plugins
'update_plugin' => false, // User can’t update any plugins
'update_core' => false // user cant perform core updates
)
);
*/


/*-----------------------------------------------*/
/*	User Admin: Remove Color Picker
/*-----------------------------------------------*/
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
remove_action( 'additional_capabilities_display', 'additional_capabilities_display' );


/*-----------------------------------------------*/
/*	Remove Admin stuff via css where no hooks exist
/* More stable than hacky php 
/*-----------------------------------------------*/
function admin_hides() {
   echo '<style type="text/css">
           .user-comment-shortcuts-wrap,
           .show-admin-bar,
           .user-rich-editing-wrap,
           .user-description-wrap,.user-url-wrap{display:none}
         </style>';
}

add_action('admin_head', 'admin_hides');



/*-----------------------------------------------*/
/*	Retard Restrictions: Remove Admin Menu Items for retards
/*-----------------------------------------------
function remove_admin_menus () {
	global $menu;
	// all users
	$restrict = explode(',', 'Links,Comments,Posts');
	// non-administrator users
	$restrict_user = explode(',', 'Appearance,Plugins,Posts,Users,Tools,Settings');
	// WP localization
	$f = create_function('$v,$i', 'return __($v);');
	array_walk($restrict, $f);
	if (!current_user_can('activate_plugins')) {
		array_walk($restrict_user, $f);
		$restrict = array_merge($restrict, $restrict_user);
	}
	// remove menus
	end($menu);
	while (prev($menu)) {
		$k = key($menu);
		$v = explode(' ', $menu[$k][0]);
		if(in_array(is_null($v[0]) ? '' : $v[0] , $restrict)) unset($menu[$k]);
	}
}
add_action('admin_menu', 'remove_admin_menus');



add_action( 'admin_menu', function() {
if (! current_user_can('administrator')) {
remove_menu_page('edit.php?post_type=acf');
} 
});
*/

?>