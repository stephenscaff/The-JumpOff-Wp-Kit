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
/*	Customize Output of Editor QuickTags
/*-----------------------------------------------*/
function jumpoff_show_quicktags( $qtInit ) {
 $qtInit['buttons'] = 'strong,em,block,del,ul,ol,li,link,code,fullscreen';
 return $qtInit;
}

/*-----------------------------------------------*/
/*	Add Text Editor Buttons
/*-----------------------------------------------*/
function jumpoff_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
	QTags.addButton( 'h4-subheader', 'SubHeader', '<h4>', '</h4>', '4', 'Sub Header', 1 );
 QTags.addButton( 'hr-sep', 'HR Seperator', '<hr class="sep"/>', '', 's', 'Horizontal rule line', 201 );
	QTags.addButton( 'arrow-link', 'Link Arrow&rarr;', '<a class="link-arrow" target="_blank" href="">', '</a>', 'z', 'Link Arrow', 200 );
	QTags.addButton( 'figcaption', 'Caption', '<figcaption>', '</figcaption>', 'f', 'Figcaption', 203 );
	QTags.addButton( 'code-inline', '&lcub;Code&rcub; Inline', '<code class="inline"/>', '', 's', 'Code: Inline', 204 );
	QTags.addButton( 'code-js', '&lcub;Code&rcub; JS', '<pre><code class="language-javascript">', '</code></pre>', 'j', 'Code: JS', 205 );
	QTags.addButton( 'code-html', '&lcub;Code&rcub; HTML', '<pre><code class="language-markup">', '</code></pre>', 'j', 'Code: HTML', 206 );
	QTags.addButton( 'code-css', '&lcub;Code&rcub; CSS', '<pre><code class="language-css">', '</code></pre>', 'j', 'Code: CSS', 207 );
    </script>
<?php
    }
}

/*-----------------------------------------------*/
/*	Add Remove P Metas to Pages, Posts, CPTs, etc
/*-----------------------------------------------*/
function jumpoff_removep_meta_box_add() {
	if ( function_exists('add_meta_box') ) {
		//add_meta_box('removep',__('Remove P', 'removep'),'jumpoff_removep_meta','post');
		add_meta_box('removep',__('Remove P', 'removep'),'jumpoff_removep_meta','page');
		//add_meta_box('removep',__('Remove P', 'removep'),'jumpoff_removep_meta','portfolio');
	}
}

/*-----------------------------------------------*/
/*	Removep post Meta Tags
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
/*-----------------------------------------------*/
/*	RemoveP - Build admin metas
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
/*	Removep - un auto p
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

/*-----------------------------------------------*/
/*	User Admin: Remove Color Picker
/*-----------------------------------------------*/
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
remove_action( 'additional_capabilities_display', 'additional_capabilities_display' );


/*-----------------------------------------------*/
/*	Remove Admin stuff via css where no hooks exist
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

?>