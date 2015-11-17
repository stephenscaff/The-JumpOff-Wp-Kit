<?php
/*-----------------------------------------------*/
/* HAdmin FUNCTIONS:
/* Hide admin bar
/* Admin Footer
/* Visual Editor
/* Editor Toolbar
/* Remove P funcitons
/* Admin Appearance
/*-----------------------------------------------*/
/*-----------------------------------------------*/
/*	Remove FrontEnd Admin bar
/*-----------------------------------------------*/
add_filter('show_admin_bar', '__return_false');  

/*-----------------------------------------------*/
/*	Admin Footer: Replace Wp text
/*-----------------------------------------------*/
function jumpoff_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://urbaninfluence.com" target="_blank">Urban Influence</a></span>' );
}
// adding it to the admin area
add_filter( 'admin_footer_text', 'jumpoff_custom_admin_footer' );

/*-----------------------------------------------*/
/*	Editor: Remove Visual Editor form Admin
/*-----------------------------------------------*/
add_filter ( 'user_can_richedit' , create_function ( '$a' , 'return false;' ) , 50 );

/*-----------------------------------------------*/
/*	Customize Output of Editor QuickTags
/*-----------------------------------------------*/
function jumpoff_show_quicktags( $qtInit ) {
 $qtInit['buttons'] = 'strong,em,block,ul,ol,li,link,fullscreen';
 return $qtInit;
}
add_filter('quicktags_settings', 'jumpoff_show_quicktags');

/*-----------------------------------------------*/
/*	Editor Toolbar: Add Text Editor Buttons
/*-----------------------------------------------*/
function jumpoff_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
 <script type="text/javascript">
	QTags.addButton( 'h3-subheader', 'SubHeader', '<h3>', '</h3>', '3', 'Sub Header', 1 );
	QTags.addButton( 'hr-sep', 'Seperator', '<hr class="sep"/>', '', 's', 'Horizontal rule line', 201 );
	QTags.addButton( 'figcaption', 'Caption', '<figcaption>', '</figcaption>', 'f', 'Figcaption', 203 );
 </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'jumpoff_add_quicktags' );

/*-----------------------------------------------*/
/*	Remove P: Add Remove P Metas to Pages, Posts, CPTs, etc
/*-----------------------------------------------*/
function jumpoff_removep_meta_box_add() {
	if ( function_exists('add_meta_box') ) {
		//add_meta_box('removep',__('Remove P', 'removep'),'jumpoff_removep_meta','post');
		add_meta_box('removep',__('Remove P', 'removep'),'jumpoff_removep_meta','page');
		//add_meta_box('removep',__('Remove P', 'removep'),'jumpoff_removep_meta','portfolio');
	}
}
add_action('admin_menu', 'jumpoff_removep_meta_box_add');

/*-----------------------------------------------*/
/*	Removep: post Meta Tags
/*-----------------------------------------------*/
function jumpoff_removep_post_meta_tags($id) {
	//$removep_edit = $_POST["removep_edit"];
	if (isset($removep_edit) && !empty($removep_edit)) {
	$removep_edit = $_POST["removep_edit"];
	$status = $_POST["removep"];
	delete_post_meta($id, '_removep');
	$br = $_POST["removep_br"];
	delete_post_meta($id, '_removep_br');
		if (isset($status) && !empty($status)) {
			add_post_meta($id, '_removep', $status);
		    }
		if (isset($br) && !empty($br)) {
			add_post_meta($id, '_removep_br', $br);
		   }
	  }
	}
add_action('edit_post', 'jumpoff_removep_post_meta_tags');
add_action('publish_post', 'jumpoff_removep_post_meta_tags');
add_action('save_post', 'jumpoff_removep_post_meta_tags');
add_action('edit_page_form', 'jumpoff_removep_post_meta_tags');

/*-----------------------------------------------*/
/*	RemoveP: Build admin metas
/*-----------------------------------------------*/
function jumpoff_removep_meta() {
	global $post;
	$post_id = $post;
	if (is_object($post_id)){
		$post_id = $post_id->ID;
	}
 	$status = get_post_meta($post_id, '_removep', true);
 	$br = get_post_meta($post_id, '_removep_br', true);
	?>
	<input type="hidden" value="1" name="removep_edit">
	<table >
	<tr>
	<td scope="row" style="text-align:left;"><input type="checkbox" name="removep" id="removepp" value="1" <?php  if ($status) echo 'checked="checked"'; ?> /><label for="removepp"> Remove Extra Paragraphs in this <?php  if($post->post_type=='page'){ ?>page<?php  } else { ?>post<?php  } ?>.</label></td>
	</tr>
	<tr>
	<td scope="row" style="text-align:left;"><input type="checkbox" name="removep_br" id="removep_br" value="1" <?php  if ($br) echo 'checked="checked"'; ?> /><label for="removep_br"> Also convert line breaks to br tags ( only work if Remove Extra Paragraphs is enabled ).</label></td>
	</tr>
	</table>
<?php
}

/*-----------------------------------------------*/
/*	Removep:  un auto p
/*-----------------------------------------------*/
function jumpoff_removep_wpautop($content) {
	global $post;
	
	if (is_page() || is_object($post)){
		
		if (get_post_meta($post->ID, '_removep', true)&&!function_exists('add_meta_box'))    {
			remove_filter('the_content', 'wpautop');
			
			if (get_post_meta($post->ID, '_removep_br', true)){
				$content=nl2br($content);
			}
		}
	}
	return $content;
}
add_filter('the_content', 'jumpoff_removep_wpautop', 9);


/*-----------------------------------------------*/
/*	Admin Appearance: Remove Color Picker
/*-----------------------------------------------*/
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
remove_action( 'additional_capabilities_display', 'additional_capabilities_display' );


/*-----------------------------------------------*/
/*	Admin Appearance: Remove via css where no hooks exist
/* More stable than hacky php 
/*-----------------------------------------------*/
function jumpoff_admin_hides() {
   echo '<style type="text/css">
           .user-comment-shortcuts-wrap,
           .show-admin-bar,
           .user-rich-editing-wrap,
           .user-description-wrap,.user-url-wrap{display:none}
         </style>';
}

add_action('admin_head', 'jumpoff_admin_hides');


/*-----------------------------------------------*/
/*	Admin Appearance: Disable default dashboard widgets
/*-----------------------------------------------*/

function jumpoff_disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    // Quick Press Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //


}
add_action('admin_head', 'jumpoff_disable_default_dashboard_widgets');




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