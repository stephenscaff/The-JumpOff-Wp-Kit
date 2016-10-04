<?php
/*-----------------------------------------------*/
/*  ADMIN FUNCTIONS
/*-----------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/** 
*  jumpoff_admin_body_class
*  Adds an admin body class that we can use to hide or target elements with css
*
*  @return: $classes (string)
*/
function jumpoff_admin_body_class( $classes ){ 
  // Global Post
  global $post;

   if( !is_object($post) ) 
        return;
  // Make sure we're getting $post object
  setup_postdata( $post );

  // Returns an object that includes the screen’s ID, base, post type, taxonomy
  // @see https://developer.wordpress.org/reference/functions/get_current_screen
  $screen = get_current_screen();

  // Construct class form the post_name
  $page_name = 'admin-'.$post->post_name;
  
  // Construct class from post id
  $post_id = 'admin-post-'.$post->ID;
  
  if ( 'post' == $screen->base ) {
    $classes .= ' ' . $screen->post_type . ' ' . $post_id . ' ' . $page_name;
  }
  if(basename(get_page_template()) === 'page.php'){
    $classes .= ' admin-page-template-default';
  }
  
  // Return our admin classes
  return $classes;
  
  // Reset
  wp_reset_postdata( $post );
}
// Run our admin body class through abdmin_body_class
add_filter( 'admin_body_class', 'jumpoff_admin_body_class' );



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