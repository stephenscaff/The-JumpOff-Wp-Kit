<?php
/*-----------------------------------------------*/
/*  DASH
/*  Widgets - remove
/*  Widgets - add
/*-----------------------------------------------*/


/*-----------------------------------------------*/
/*  Dash - remove widgets
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


?>