<?php
/*-----------------------------------------------*/
/*  ADMIN FUNCTIONS
/* Admin Appearance
/* Admin Widgets
/* Admin Editor
/* Admin Post Filters
/*-----------------------------------------------*/

/*-----------------------------------------------*/
/*  Editor: Remove Visual Editor form Admin
/*-----------------------------------------------*/
//add_filter ( 'user_can_richedit' , create_function ( '$a' , 'return false;' ) , 50 );

/*-----------------------------------------------*/
/*  Admin Appearance: Remove FrontEnd Admin bar
/*-----------------------------------------------*/
add_filter('show_admin_bar', '__return_false');  

/*-----------------------------------------------*/
/*  Admin Appearance: Remove Color Picker
/*-----------------------------------------------*/
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
remove_action( 'additional_capabilities_display', 'additional_capabilities_display' );

/*-----------------------------------------------*/
/*  Admin Appearance: Remove via css where no hooks exist
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
/*  Remove Admin Bar stuffs
/*-----------------------------------------------*/
function jumpoff_admin_bar_remove() {
  global $wp_admin_bar;

  $wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
  $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
  $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
  $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
  $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
  $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
  //$wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
  $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
  $wp_admin_bar->remove_menu('updates');          // Remove the updates link
  $wp_admin_bar->remove_menu('comments');         // Remove the comments link
  $wp_admin_bar->remove_menu('new-content');      // Remove the content link
  //$wp_admin_bar->remove_menu('my-account'); 
}

add_action('wp_before_admin_bar_render', 'jumpoff_admin_bar_remove', 0);

/*-----------------------------------------------*/
/*  Admin Footer: Replace Wp text
/*-----------------------------------------------*/
function jumpoff_custom_admin_footer() {
  _e( '<span id="footer-thankyou">Developed by <a href="http://urbaninfluence.com" target="_blank">Urban Influence</a></span>' );
}
// adding it to the admin area
add_filter( 'admin_footer_text', 'jumpoff_custom_admin_footer' );


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