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
 /* Example for post types
 if (is_singular('team') || is_post_type_archive( 'team' )) {
  $classes[] = 'team';
 }
 */
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
 $classes[] = 'ani-fade-in-page';
 $classes = array_diff($classes, $remove_classes);
  return $classes;
}

add_filter('body_class', 'jumpoff_body_class');

/*-----------------------------------------------*/
/*  jumpoff_imgpath()
/*
/*  An image path helper that gets template path
/*  and out theme's images location (assets/images/)
/*  Fallback to no-img.jpg
/*  @example: <img src="<?php jumpoff_imgpath(); ?>/image.jpg"/>
/*-----------------------------------------------*/
function jumpoff_imgpath(){
  $template_path = bloginfo('template_directory');
  $img_path = $template_path . '/assets/images/';
  echo $img_path;
}

/*-----------------------------------------------*/
/* jumpoff Excerpt - 
/* Outputs a shortened get_the_excerpt via length arg (by char)
/* @example jumpoff_excerpt(100);
/*-----------------------------------------------*/
function jumpoff_excerpt($characters, $rep='...') {
  $excerpt = get_the_excerpt('','',false);
  $shortened_excerpt = jumpoff_text_limit($excerpt, $characters, $rep);
  echo $shortened_excerpt;
}

/*-----------------------------------------------*/
/* jumpoff Title 
/*
/* Outputs a shortened the_title via length arg (by char)
/*  @params Characters (integer), 
/* @example jumpoff_title(100);
/*-----------------------------------------------*/
function jumpoff_title($characters, $rep='...') {
  $title = the_title('','',false);
  $shortened_title = jumpoff_text_limit($title, $characters, $rep);
  echo $shortened_title;
}

/*-----------------------------------------------*/
/* jumpoff_text_limit() 
/* 
/* Function to limit text length outputs
/* Can be called inside title and excerpt functions
/*
/*  @params $string, $length, $replacer
/*  @return string
/*-----------------------------------------------*/
function jumpoff_text_limit($string, $length, $replacer) {
  if(strlen($string) > $length)
  return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
  return $string;
}

/*-----------------------------------------------*/
/*  jumpoff_cats()
/*  
/*  Get a list of the posts cats
/*  @example: jumpoff_get_cats()
/*-----------------------------------------------*/
function jumpoff_cats() {
  $args = array(
  'orderby' => 'name',
  'parent' => 0
  );
  $categories = get_categories( $args );
  if ( $categories ) {
    foreach ( $categories as $category ) {
      echo( '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>');
    }
  }
}

/*-----------------------------------------------*/
/*  jumpoff_cats_unlinked
/*  
/*  Get Unlinked category namea, to output as classes
/*  (for filtering & sorting & modifiers and so on. Or pass in a seperator for other stuff)
/*  @example: <li class="<? echo jumpoff_cats_unlinked ?>">
/*-----------------------------------------------*/
function jumpoff_cats_unlinked($separator = ' ') {
  $categories = (array) get_the_category();
  $thelist = '';
 
  foreach($categories as $category) {    // concate
    $thelist .= $separator . $category->category_nicename;
  }                                                                                                                                                       
  echo $thelist;
}

/*-----------------------------------------------*/
/*  jumpoff_get_cat_slug
/*
/*  Get cat from slug
/*  @return $categories (post_name);
/*-----------------------------------------------*/
function jumpoff_get_cat_slug(){
  global $post;
  $categories = get_the_category($post->ID);
  return $categories[0]->slug;
}

/*-----------------------------------------------*/
/*  jumpoff_get_cat_archive()
/*
/*  Builds category archive links by passing in the Cat Name
/*  @param: $cat_name (name of category)
/*  @example: <?php echo jumpoff_get_cat_archive('Category Name') ?>
/*-----------------------------------------------*/
function jumpoff_get_cat_archive($cat_name){
  global $post;
  // Get the ID of a given category
  $category_id = get_cat_ID($cat_name);

  // Get the URL of this category
  $category_link = get_category_link( $category_id  );
  $cat_url = '<a href="'. $category_link .'" title="'.$cat_name.'">'.$catn_ame.'</a>';
  return $cat_url;
}

/*-----------------------------------------------*/
/* jumpoff_taxonomy()
/*-----------------------------------------------*/
function jumpoff_taxonomy( $taxonomy, $separator = ' ' ) {
  $terms = get_terms($taxonomy);
  $thelist = '';
  if ($terms) {
    foreach($terms as $term) {
      $thelist .= $separator .  $term->slug;
    }
  }
  echo $thelist;
}

/*-----------------------------------------------*/
/*  jumpoff_taxonomy_unlinked()
/*
/*  Get Unlinked Taxonomy Names
/*-----------------------------------------------*/
function jumpoff_taxonomy_unlinked($taxonomy_name, $tolower = false) {
  global $post;
  $terms = wp_get_post_terms($post->ID, $taxonomy_name);
  $count = count($terms);
  if ( $count > 0 ) {
    foreach ( $terms as $term ) {
      if ($tolower){
        echo strtolower ($term->name);
      } else {
        echo $term->name ;
      }
    }
  }
}

/*-----------------------------------------------*/
/*  jumpoff_slug: 
/*  
/*  Get category by page slug. Used for passing as var in `get_posts args
/*  @return $slug (post_name);
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