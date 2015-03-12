<?php
/*--------------------------------------------------*/
/*	Head Clean Up
/*--------------------------------------------------*/
function jumpoff_head_cleanup() {
  // Originally from http://wpengineer.com/1438/wordpress-header/
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  //remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

  global $wp_widget_factory;
  remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  add_filter('use_default_gallery_style', '__return_null');
}

function jumpoff_rel_canonical() {
  global $wp_the_query;

  if (!is_singular()) {
    return;
  }

  if (!$id = $wp_the_query->get_queried_object_id()) {
    return;
  }

  $link = get_permalink($id);
  echo "\t<link rel=\"canonical\" href=\"$link\">\n";
}
//add_action('init', 'jumpoff_head_cleanup');

/*--------------------------------------------------*/
/*	Remove Wp Version - for security
/*--------------------------------------------------*/
function remove_wp_version() { return ''; }
add_filter('the_generator', 'remove_wp_version');
add_filter('the_generator', '__return_false');

/*--------------------------------------------------*/
/*  Language_attributes(): used in <html> tag
/*  Change lang="en-US" to lang="en"
/*  Remove dir="ltr
/*--------------------------------------------------*/ 
function jumpoff_language_attributes() {
  $attributes = array();
  $output = '';

  if (function_exists('is_rtl')) {
    if (is_rtl() == 'rtl') {
      $attributes[] = 'dir="rtl"';
    }
  }

  $lang = get_bloginfo('language');

  if ($lang && $lang !== 'en-US') {
    $attributes[] = "lang=\"$lang\"";
  } else {
    $attributes[] = 'lang="en"';
  }

  $output = implode(' ', $attributes);
  $output = apply_filters('jumpoff_language_attributes', $output);

  return $output;
}
//add_filter('language_attributes', 'jumpoff_language_attributes');
 
/*--------------------------------------------------*/
/*	Clean up output of stylesheet <link> tags
/*--------------------------------------------------*/ 
function jumpoff_clean_style_tag($input) {
  preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);
  // Only display media if it's print
  $media = $matches[3][0] === 'print' ? ' media="print"' : '';
  return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}
//add_filter('style_loader_tag', 'jumpoff_clean_style_tag');


/*--------------------------------------------------*/
/*	Remove Versions: js and css
/*--------------------------------------------------*/
function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
//add_filter( 'style_loader_src', 'remove_cssjs_ver', 1000 );
//add_filter( 'script_loader_src', 'remove_cssjs_ver', 1000 );

/*--------------------------------------------------*/
/*	Stop Injected Styles: Remove Recent Comments Widget CSS
/*--------------------------------------------------*/
function jumpoff_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}
/*--------------------------------------------------*/
/*	Stop Injected Styles: Remove Recent Comments CSS
/*--------------------------------------------------*/
function jumpoff_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

/*--------------------------------------------------*/
/*	Stop Injected Styles: Gallery Styles
/*--------------------------------------------------*/
function jumpoff_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/*--------------------------------------------------*/
/*	Images: Remove auto HxW
/*--------------------------------------------------*/
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

/*--------------------------------------------------*/
/*	Images: Stop autolinking
/*--------------------------------------------------*/
update_option('image_default_link_type','none');


?>