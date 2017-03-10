<?php
/**
 * DashWidgets
 * IF using the existing Dash, register widgets ehre.
 *
 * @see https://codex.wordpress.org/Function_Reference/wp_add_dashboard_widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

if (!class_exists('DashWidgets')) {
  
  class DashWidgets {
    
    /**
     * Constructor
     */
    function __construct() {
      add_action('admin_head', array( $this, 'disable_widgets') );
      add_action( 'wp_dashboard_setup', array( $this, 'register_widgets' ) );
    }

    /**
     * Register Widgets
     */
    function register_widgets(){
      wp_add_dashboard_widget( 'welcome', 'Welcome', array( $this, 'welcome' ));
      wp_add_dashboard_widget( 'admin_links', 'Admin Management', array( $this, 'admin_links' ) );
    }

    /**
     * Disabe Widgets
     */
    function disable_widgets() {
      global $wp_meta_boxes;
      // Remove Welcome panel
      remove_action('welcome_panel', 'wp_welcome_panel');

      // Unset all other default widgets
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);       
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); 
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);      
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
    }

    /**
     * Welcome Widget
     */
    public function welcome(){
      ?>
      <article class="widget">
        <footer class="widget__footer box__footer">
          <h1>Hello.</h1>
          <p>Welcome to your site's CMS</p>
        </footer>
      </article>
      <?php
    }

    /**
     * Admin Links Widgets
     */
    public function admin_links() {
      ?>
      <article class="widget box">
        <div class="widget__content box__content">
          <p><i class="dashicons-before dashicons-admin-post"></i> <a class="" href="edit.php">Create a Blog Post</a></p>
          <hr class="sep">
          <p><i class="dashicons-before dashicons-admin-page"></i> <a class="" href="edit.php?post_type=page">Edit a Page / Page Copy</a></p>
          <hr class="sep">
          <p><i class="dashicons-before dashicons-screenoptions"></i>  <a class="" href="edit.php?post_type=work">Manage Your Projects</a> | <a class="" href="post-new.php?post_type=work">Create a New Project</a></p>
          <hr class="sep">
        </div>
        <footer class="widget__footer box__footer"></footer>
      </article>  <?php
    }
  }
}

// Init Class
new DashWidgets;