<?php
/*-----------------------------------------------*/
/* HELPER FUNCTIONS:
/* Body Classes
/* Class Names
/* Dropdowns examples
/* Post Metas
/* Pagination
/* Popular Posts
/*-----------------------------------------------*/

/*--------------------------------------------------*/
/* Body Classes : add and remove
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
 if (is_singular('jobs') || is_archive('jobs')){
  $classes[] = 'jobs';
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
/* Get Unlinked category name for class
/*-----------------------------------------------*/
function jumpoff_unlinked_cats($separator = ' ') {
 $categories = (array) get_the_category();
 $thelist = '';
 
 foreach($categories as $category) {    // concate
  $thelist .= $separator . $category->category_nicename;
 }
echo $thelist;
}


/*-----------------------------------------------*/
/* Get taxonomy unlinked
/*-----------------------------------------------*/
function jumpoff_taxonony_unlinked($taxonomy_name, $tolower = false) {
 global $post;
 $terms = wp_get_post_terms($post->ID, $taxonomy_name);
 $count = count($terms);
 if ( $count > 0 ) {
  foreach ( $terms as $term ) {
   if ($tolower){
    echo strtolower ($term->name);
   } else{
    echo $term->name ;
   }
  }
 }
}

/*-----------------------------------------------*/
/* DropDown from custom taxonomy for js filtering
/*-----------------------------------------------*/
function jumpoff_custom_taxonomy_dropdown( $taxonomy ) {
 $terms = get_terms( $taxonomy );
 if ( $terms ) {
  printf( '<div class="js-dropdown right"><nav class="filter-item"><ul><li class="label"><span data-label="View by Category">Select Category</span><div class="caret"></div></li>', esc_attr( $taxonomy ) );
  foreach ( $terms as $term ) {
   printf( '<li class="filter" data-filter=".%s">%s</li>', esc_attr( $term->slug ), esc_html( $term->name ) );
  }
  print( '</ul></nav></div>' );
 }
}

/*-----------------------------------------------*/
/* Dropdown from Cat Links
/*-----------------------------------------------*/
function jumpoff_category_dropdown() {
  $args = array(
  'orderby' => 'name',
  'parent' => 0
  );
 $categories = get_categories( $args );
 if ( $categories ) {
  printf( '<div class="js-dropdown has-links right"><nav class="filter-item"><ul><li class="label"><span data-label="Select a Category">Select A Category</span><div class="caret"></div></li>');
  foreach ( $categories as $category ) {
   printf( '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>');
  }
  print( '</ul></nav></div>' );
 }
}

/*-----------------------------------------------*/
/*  Get first word from title
/*-----------------------------------------------*/
function jumpoff_title_firstword(){
$title = current(explode(' ', get_the_title()));
echo $title;
}

/*-----------------------------------------------*/
/* Create List Items from Line Breaks
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