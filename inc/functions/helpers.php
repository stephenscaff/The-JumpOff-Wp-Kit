<?php
/*-----------------------------------------------*/
/* HELPER FUNCTIONS:
/* Body Classes
/* Path helpers
/* Excerpts and shorteners
/* Cats and Taxonomies
/* Line Breaks
/*-----------------------------------------------*/

/*--------------------------------------------------*/
/*  jumpoff_body_class
/*  @description: Cleans up body classes, then adds custom
/*                based on page or cpt names
/*--------------------------------------------------*/ 
function jumpoff_body_class($classes) {
 global $post, $page;

 // Add page name to body class
 if (is_single() || is_page() && !is_front_page()) {
  $classes[] = basename(get_permalink());
 }
 if (is_home() || is_singular('post') || is_post_type_archive( 'post' )) {
  $classes[] = 'blog';
 }

 //Example for CPTs
 if (is_singular('work') || is_post_type_archive( 'work' )) {
  $classes[] = 'work';
 }

 // Remove Classes
 $home_id_class = 'page-id-' . get_option('page_on_front');
 $page_id_class = 'page-id-' . get_the_ID();
 $post_id_class = 'postid-' . get_the_ID();
 $page_template_name_class = 'page-template-page-' . basename(get_permalink());
 $page_template_name_php = 'page-template-page-' . basename(get_permalink()) . '-php';
 
 $remove_classes = array(
  'page-template-default', 'page-template', 'single-format-standard',
   $home_id_class,
   $page_id_class,
   $post_id_class,
   $page_template_name_class,
   $page_template_name_php
 );

 //Add specific classes
 $classes[] = 'fade-in-page';
 $classes = array_diff($classes, $remove_classes);
  return $classes;
}

add_filter('body_class', 'jumpoff_body_class');


/*-----------------------------------------------*/
/*  jumpoff_slug: 
/*  
/*  @description: Get category by page slug. Used for passing as var in `get_posts args
/*  @return: $slug (post_name);
/*  @example:
/*   // if is home  
    if ( is_home() ) {
    $slug = null;
  // else if is cat page  
  } else {
    $slug = jumpoff_slug();
  }  
  $args = array(
    'posts_per_page'   => 5,
    'offset'           => 0,
    'category_name'    => $slug,
    'orderby'          => 'date',
    'order'            => 'DESC'
/*-----------------------------------------------*/
function jumpoff_slug() {
  global $post;
  $slug = get_post( $post )->post_name;
  return $slug;
}


/*-----------------------------------------------*/
/*  jumpoff_ids ()
/*  @description: Retrieves IDs to use in calling fields.
/*  @example: $postidd = jumpoff_ids();
/*-----------------------------------------------*/
function jumpoff_ids() {
  $page_for_posts = get_option( 'page_for_posts' );
  if (is_home()){
    $postid = $page_for_posts;
  } else {
    $postid = $post->ID;
  }
  return $postid;
}

/*-----------------------------------------------*/
/*  jumpoff_ids ()
/*  @description: Retrieves IDs to use in calling fields.
/*  @example: $postidd = jumpoff_ids();
/*-----------------------------------------------*/
function jumpoff_ids() {
  global $post;
  $page_for_posts = get_option( 'page_for_posts' );
  $id;
  if (is_post_type_archive()){
    $post_type = get_queried_object();
    $cpt = $post_type->rewrite['slug'];
    $id = "cpt_$cpt";
  } elseif (is_home()){
    $id = 'options'; //$page_for_posts;
  } elseif (is_front_page()) {
    $id = get_option('page_on_front');
  } else{
    $id = $post->ID;
  }
  return $id;
}

/*-----------------------------------------------*/
/*  jumpoff_mast_class ()
/*  Adds BEM modifier classes to mast partials..
/*-----------------------------------------------*/
function jumpoff_mast_class() {
  $page_for_posts = get_option( 'page_for_posts' );
  $class='';
  if (is_home()){
    $class ='blog';
  } elseif (is_front_page()) {  
    $class ='home';
  } elseif (is_archive()){
    $class = 'archive';
  } else {
    $class = basename(get_permalink());
  }
  return $class;
}

/*-----------------------------------------------*/
/* Wrap mast text line breaks in BEM syntax
/*-----------------------------------------------*/
function jumpoff_mast_text ( $textarea ){
 $lines = explode("\n", $textarea);
 if ( !empty($lines) ) {
 foreach ( $lines as $line ) {
  echo '<p class="mast__text">'. trim( $line ) .'</p>';
  }
 }
}
/*-----------------------------------------------*/
/*  jumpoff_breaks_list ()
/*  @description: Wraps line breaks from as custom fieldin list items
/*  @example: jumpoff_breaks_list($fieldname)
/*-----------------------------------------------*/
function jumpoff_breaks_list ( $textarea ){
 $lines = explode("\n", $textarea);
if ( !empty($lines) ) {
  echo '<ul class="list-disc">';
 foreach ( $lines as $line ) {
  echo '<li>'. trim( $line ) .'</li>';
 }
 echo '</ul>';
 }
}



?>