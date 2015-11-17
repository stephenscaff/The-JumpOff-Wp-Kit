<?php
/*--------------------------------------------------*/
/*	Head Clean Up
/*--------------------------------------------------*/
function jumpoff_head_cleanup() {

  //Remove rss links
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'rsd_link');

  // Remove xml manifest
  remove_action('wp_head', 'wlwmanifest_link');
  //remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
  
  // Remove Stupid Emoticons
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  
  //Remove versions from css and js
  add_filter('style_loader_src', 'jumpoff_remove_cssjs_ver', 1000 );
  add_filter('script_loader_src', 'jumpoff_remove_cssjs_ver', 1000 );

  //Remove Wp Version
  add_filter('the_generator', 'jumpoff_remove_wp_version');

}
add_action('init', 'jumpoff_head_cleanup');


/*--------------------------------------------------*/
/*	Remove Wp Version - for security
/*--------------------------------------------------*/
function jumpoff_remove_wp_version() {
  return '';
}

/*--------------------------------------------------*/
/*	Remove Versions: js and css
/*--------------------------------------------------*/
function jumpoff_remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

/*--------------------------------------------------*/
/*	Stop Injected Styles: Gallery Styles
/*--------------------------------------------------*/
function jumpoff_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/*--------------------------------------------------*/
/*  Lang atts
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
  $output = apply_filters('admissionado_language_attributes', $output);

  return $output;
}

/*--------------------------------------------------*/
/*  Canonical LInk
/*--------------------------------------------------*/
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

?>