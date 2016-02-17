<?php
/*-----------------------------------------------*/
/*	ADMIN FUNCTIONS
/* Admin Appearance
/* Admin Widgets
/* Admin Editor
/* Admin Post Filters
/*-----------------------------------------------*/

/*-----------------------------------------------*/
/*	Editor: Remove Visual Editor form Admin
/*-----------------------------------------------*/
//add_filter ( 'user_can_richedit' , create_function ( '$a' , 'return false;' ) , 50 );

/*-----------------------------------------------*/
/*	Admin Appearance: Remove FrontEnd Admin bar
/*-----------------------------------------------*/
add_filter('show_admin_bar', '__return_false');  

/*-----------------------------------------------*/
/*	Admin Appearance: Remove Color Picker
/*-----------------------------------------------*/
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
remove_action( 'additional_capabilities_display', 'additional_capabilities_display' );

/*-----------------------------------------------*/
/*	Admin Appearance: Remove via css where no hooks exist
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
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);       // Right Now Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);       // Quick Press Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
}
add_action('admin_head', 'jumpoff_disable_default_dashboard_widgets');


/*-----------------------------------------------*/
/* Welcome Dash - Add a welcome widget
/*-----------------------------------------------*/
function jumpoff_add_dashboard_widgets() {
  wp_add_dashboard_widget( 'jumpoff_dashboard_welcome', 'Welcome to Your Site', 'jumpoff_welcome_widget' );
}

function jumpoff_welcome_widget() { ?>
   <div class="box">
    <div class="box-content" style="background-color: #1f2d36;">
     <a href="/"><img src="/wp-content/themes/wallbed/assets/images/logo-jumpoff.png" width="320"></a>
    </div>
    <div class="box-footer">
     <p><a class="" href="edit.php">Create a Blog Post</a></p>
     <p><a class="" href="edit.php?post_type=page">Edit a Page / Page Copy</a></p>
    </div>
   </div>
<?php }

add_action( 'wp_dashboard_setup', 'jumpoff_add_dashboard_widgets' );


/*-----------------------------------------------*/
/*	Admin Footer: Replace Wp text
/*-----------------------------------------------*/
function jumpoff_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://urbaninfluence.com" target="_blank">Urban Influence</a></span>' );
}
// adding it to the admin area
add_filter( 'admin_footer_text', 'jumpoff_custom_admin_footer' );

/*-----------------------------------------------*/
/*	Editor: Customize Output of Editor QuickTags
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
/* Post Filters: Add to Query for post filter
/*-----------------------------------------------*/
function jumpoff_admin_posts_filter( &$query )
{
 if ( 
  is_admin() 
  AND 'edit.php' === $GLOBALS['pagenow']
  AND isset( $_GET['p_format'] )
  AND '-1' != $_GET['p_format']
     )
 {
  $query->query_vars['tax_query'] = array( array(
   'taxonomy' => 'post_format'
  ,'field'    => 'ID'
  ,'terms'    => array( $_GET['p_format'] )
  ) );
 }
}
add_filter( 'parse_query', 'jumpoff_admin_posts_filter' );

/*-----------------------------------------------*/
/* Post Filters: Add Taxonomies to Post Filter
/*-----------------------------------------------*/
function jumpoff_restrict_manage_posts_format()
{
  wp_dropdown_categories( array(
   'taxonomy'         => 'post_format',
   'hide_empty'       => 0,
   'name'             => 'p_format',
   'show_option_none' => 'Select Post Format'
  ) );
}
add_action( 'restrict_manage_posts', 'jumpoff_restrict_manage_posts_format' );

/*-----------------------------------------------*/
/* Post Filters: Add Taxonomies to Post Filter
/*-----------------------------------------------*/
function jumpoff_add_taxonomy_filters() {
  global $typenow;
 
  // an array of all the taxonomyies you want to display. Use the taxonomy name or slug
  $taxonomies = array('post-functions'); //arry of the post functions to add
 
  foreach ($taxonomies as $tax_slug) {
    $tax_obj = get_taxonomy($tax_slug);
    $tax_name = $tax_obj->labels->name;
    $terms = get_terms($tax_slug);
    
    if(count($terms) > 0) {
      echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
      echo "<option value=''>Show All $tax_name</option>";
      foreach ($terms as $term) { 
        echo '<option value='. $term->slug, isset($_GET[$tax_slug]) == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
      }
      echo "</select>";
    }
  }
}
add_action( 'restrict_manage_posts', 'jumpoff_add_taxonomy_filters' );

?>