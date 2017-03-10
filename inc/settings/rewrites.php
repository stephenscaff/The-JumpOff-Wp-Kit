<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *  Allows post type and custom taxonomy slugs 
 *  be the same and actually work. 
 */
function jumpoff_taxonomy_slug_rewrite($wp_rewrite) {
  $rules = array();
  // get all custom taxonomies
  $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
  // get all custom post types
  $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects');
    
  foreach ($post_types as $post_type) {
    foreach ($taxonomies as $taxonomy) {
      // go through all post types which this taxonomy is assigned to
      foreach ($taxonomy->object_type as $object_type) {
        // check if taxonomy is registered for this custom type
        if ($object_type == $post_type->rewrite['slug']) {
          // get category objects
          $terms = get_categories(array('type' => $object_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));
          // make rules
          foreach ($terms as $term) {
            $rules[$object_type . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
          }
        }
      }
    }
  }
  // merge with global rules
  $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'jumpoff_taxonomy_slug_rewrite');

?>