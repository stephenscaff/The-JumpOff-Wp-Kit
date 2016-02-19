<?php
/*-----------------------------------------------*/
/* HELPER FUNCTIONS:
/* Nav
/* Body class
/* Image Helpers
/* Taxonomies and Cats
/* Text Helpers
/*-----------------------------------------------*/


/*--------------------------------------------------*/
/*  Nav - Add is-current class
/*  Not using Wp's native nav. 
/*  This nav is too crazy for the risk of adding more pages.
/*
/*  @param: 'page-name'
/*  @return: is-current
/*  @example: echo jumpoff_active_class('page-slug') ?>
/*--------------------------------------------------*/
function jumpoff_active_class($page_name){
if (is_page( $page_name )) 
  return 'is-current';
}

/*--------------------------------------------------*/
/* jumpoff_get_page_link
/*--------------------------------------------------*/ 
function jumpoff_get_page_link($page_name){
  $page_link = esc_url( get_permalink( get_page_by_title( $page_name ) ) );
  return $page_link;
}

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

 //if (is_singular('jobs') || is_archive('jobs')){
 // $classes[] = 'jobs';
 //}

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
/*  jumpoff_first_img()
/*
/*  Get first image in post
/*  Fallback to no-img.jpg
/*  @example: echo jumpoff_first_img();
/*-----------------------------------------------*/
function jumpoff_first_img() {
   global $post, $posts;
   $first_img = '';
   ob_start();
   ob_end_clean();
  if( $output = preg_match_all('/<img.+src=\'"[\'""].*>/i', $post->post_content, $matches) ) {
    $first_img = $matches[1][0];
  }
   $url =  get_template_directory_uri();
   if(empty($first_img)){ //Defines a default image
     $first_img = "$url/assets/images/no-img.jpg";
   }
  return $first_img;
}

/*--------------------------------------------------*/
/* Featured Image with fallbacks (4)
/*  Used as the primary way to call images in loops/queries
/*  1. Get Ft Image
/*  2. Get Post attachement
/*  3. Get Girst image in post content
/*  4. Get no-img.jpg fallback
/*  
/*  @example: jumpoff_ftimg_fallbacks('full')
/*  @param $imgSize (images size - ie; full, medium, small)
/*--------------------------------------------------*/ 
function jumpoff_ftimg_fallbacks($imgSize){
  global $post, $posts;
  $image_id = get_post_thumbnail_id();  //read featured image data for image url
  $attached_to_post = wp_get_attachment_image_src( get_post_thumbnail_id(), $imgSize, false);
  $related_img =  $attached_to_post[0];                         

  if($related_img == ""):
    $attachments = get_children( array(
      'post_parent'    => get_the_ID(),
      'post_type'      => 'attachment',
      'numberposts'    => 1, 
      'post_status'    => 'inherit',
      'post_mime_type' => 'image',
      'order'          => 'ASC',
      'orderby'        => 'menu_order ASC'
      ) );
    if(!empty($attachments)): //check if there's an image attached or not
      foreach ( $attachments as $attachment_id => $attachment ) {
        if(wp_get_attachment_image($attachment_id) != ""):
            $related_img = wp_get_attachment_url( $attachment_id );
        endif;                        
      }
    else:  // if no attachment 
      $first_img = '';
      ob_start();
      ob_end_clean();
      if( $output = preg_match_all('/<img.+src=\'"[\'""].*>/i', $post->post_content, $matches) ) {
        $first_img = $matches[1][0];
      }
      if(!empty($first_img)):
          $related_img = $first_img;
      else:
          $related_img = bloginfo('template_directory')."/assets/images/no-img.jpg";    //define default thumbnail, you can use full url here.
      endif;
    endif;   
  endif;  

  echo $related_img;
} 


/*-----------------------------------------------*/
/*  jumpoff_img_id_url
/*  
/*  Get Image's URL Via it's ID
/*  @param $imgSize (images size - ie; full, medium, small)
/*  @return $img_url;
/*-----------------------------------------------*/
function jumpoff_img_id_url($imgField, $imgSize) {
  $getImg = get_field($imgField);
  $getImgSize = $imgSize; // (get full size)
  $image_array = wp_get_attachment_image_src($getImg, $getImgsize);
// finally, extract and store the URL from $image_array
  $image_url = $image_array[0];
 return $image_url;
}

/*-----------------------------------------------*/
/* Text Limits - 
/* Function to limit text length outputs
/* We be called inside title and excerpt functions
/*-----------------------------------------------*/
function jumpoff_text_limit($string, $length, $replacer) {
 if(strlen($string) > $length)
 return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
 return $string;
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
/* Get Unlinked Taxonomy Names
/*-----------------------------------------------*/
function jumpoff_taxonomy_unlinked($taxonomy_name, $tolower = false) {
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
/*  Echo Single Category (first in cat array)
/*-----------------------------------------------*/
function jumpoffd_single_cat(){
  if( $category = get_the_category()) {
    echo $category[0]->name ;
  }
}

/*-----------------------------------------------*/
/*  Get Single Cat Link
/*  echo as href
/*-----------------------------------------------*/
function jumpoff_single_cat_link() {
$category = get_the_category();
  if ($category) {
    echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
  }
}

/*-----------------------------------------------*/
/*  Get Single Cat Path
/*  echo as path - used for simulated links on 
/*  articles with block level links
/*
/*  @example: <h6 class="post__category" data-sim-link="<?php jumpoff_single_cat_path(); ?>"><?php echo jumpoff_single_cat(); ?></h6>
/*-----------------------------------------------*/
function jumpoff_get_single_cat_path() {
$category = get_the_category();
  if ($category) {
    echo get_category_link( $category[0]->term_id );
  }
}

/*-----------------------------------------------*/
/*  Get Single Cat from slug
/*
/*  @return $categories (post_name);
/*-----------------------------------------------*/
function jumpoff_get_cat_slug(){
  global $post;
  $categories = get_the_category($post->ID);
  return $categories[0]->slug;
}


/*-----------------------------------------------*/
/*  Get Single Cat Link
/*  echo as href
/*-----------------------------------------------*/
function jumpoff_get_single_cat_link() {
$category = get_the_category();
  if ($category) {
    echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
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
/*  jumpoff_get_cat_archive()
/*
/*  Builds category archive links by padding in the Cat Name
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

/*-----------------------------------------------*/
/* EXAMPLE: DropDown from taxonomy for js filtering
/*-----------------------------------------------*/
function jumpoff_taxonomy_dropdown( $taxonomy ) {
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
/* EXAMPLE: Dropdown from Cat Links
/*-----------------------------------------------*/
function jumpoff_cat_dropdown() {
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
?>