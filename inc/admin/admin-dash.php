<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Remove Widgets from dash
 */
function jumpoff_disable_default_dashboard_widgets() {
  global $wp_meta_boxes;

  // Right Now Widget
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);

  // Activity Widget
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);    

  // Comments Widget
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);

  // Incoming Links Widget
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);

  // Plugins Widge
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);    

  // Quick Press Widget
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);   

  // Recent Drafts Widget
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);

  // Primary 
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

  // Secondary
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
}

add_action('admin_head', 'jumpoff_disable_default_dashboard_widgets');


/**
 *  Add Dash widgets
 *  @todo Let's make this better at some point
 */
function jumpoff_add_dashboard_widgets() {

  // Add Greetings
  wp_add_dashboard_widget( 'jumpoff_welcome_widget', 'Greetings...', 'jumpoff_welcome_widget' );

  // Site Links
  wp_add_dashboard_widget( 'jumpoff_site_links_widget', 'Front End Pages', 'jumpoff_site_links_widget' );

  // Admin Management
  wp_add_dashboard_widget( 'jumpoff_admin_widget', 'Admin Management', 'jumpoff_admin_widget' );

}

add_action( 'wp_dashboard_setup', 'jumpoff_add_dashboard_widgets' );

/**
 * Add logo to dash
 */
function jumpoff_logo_widget() { ?>
   <article class="widget">
    
    <footer class="widget__footer box__footer">
      <h1>Welcome to the Jumpoff.</h1>
      <p>From this admin you can manage most aspects of your site.</p>
    </footer>

   </article>
<?php }

/**
 * Admin Widget
 */
function jumpoff_admin_widget() { ?>
   <article class="widget box">
    <div class="widget__content box__content">
      <p><i class="dashicons-before dashicons-admin-post"></i> <a class="" href="edit.php">Create a Blog Post</a></p>
      <p><i class="dashicons-before dashicons-admin-page"></i> <a class="" href="edit.php?post_type=page">Edit a Page / Page Copy</a></p>
      <hr class="sep">
      <p><i class="dashicons-before dashicons-id"></i> <a class="" href="edit.php?post_type=team">Manage Team Members</a></p>
    </div>
    <footer class="widget__footer box__footer"></footer>
   </article>
<?php }

/**
 * Site Links Widget
 */
function jumpoff_site_links_widget() { ?>
   <article class="widget box">
    <div class="widget__content box__content">
      <p><a class="" href="<?php jumpoff_page_url('home') ?>" target="_blank">Visit Homepage→</a></p>
      <p><a class="" href="<?php jumpoff_page_url('blog') ?>" target="_blank">Visit Blog→</a></p>
      <p><a class="" href="<?php jumpoff_page_url('about') ?>" target="_blank">Visit About→</a></p>
    </div>
    <footer class="widget__footer box__footer"></footer>
   </article>
<?php }

?>