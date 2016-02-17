<?php
/*-----------------------------------------------*/
/*  POST LOOPS & QUERIES FUNCTIONS:
/*  Get Posts by Cat, 2 templates
/*  Get Posts Cat Module
/*  Get Posts Video Module
/*  Popular Posts Functions - counter and display
/*-----------------------------------------------*/

/*------------------------------------------------------*/
/*  Get Posts by Category
/*  Use featured template for first post
/*  Use micro template for remaining via a simple counter
/*
/*  @param:   $postcat (category_name slug)
/*  @return:  $posts
/*  @example: jumpoff_get_cat_posts('category-name') or jumpoff_get_cat_posts($cat) 
/*-------------------------------------------------------*/
function jumpoff_get_cat_posts($postcat){
  global $post ; 
  $args = array(
   'posts_per_page'   => 3,
   'offset'           => 0,
   'category_name'    => $postcat,
   //'exclude'          => '26',
   //'category__not_in' => array(26),
   'tax_query' => array(
   array(
   'taxonomy' => 'post_format',
   'field' => 'slug',
   'terms' => array( 'post-format-video','post-format-link' ),
   'operator' => 'NOT IN',
   ),
  ));

  $counter = 1;
  $posts = get_posts( $args );
  // set_transient( 'posts_query', $posts, 12 * 60 * 60 );
  foreach ( $posts as $post ) : setup_postdata( $post );
  if ($counter == 1) {
    //Get template form partials/content/content-category-featured
   get_template_part( 'partials/content/content', 'category-featured' );
  } else {
    //Get template form partials/content/content-category-list
   get_template_part( 'partials/content/content', 'category-list' );
  }
  $counter++;
  endforeach;
  wp_reset_postdata();

  return $posts;
}


/*------------------------------------------------------*/
/*  Jumpoff Category Module
/*  Wraps the 'jumpoff_get_cat_posts()' funciton with a header and footer via page templates
/* 
/*  @param:   $postcat (category_name slug) string
/*  @example: jumpoff_cat_module('category-name')
/*-------------------------------------------------------*/
function jumpoff_cat_module($postcat){
  $cat = get_term_by( 'slug', $postcat, 'category');
  // Get Section Heading
  echo '<h4 class="section-heading">'.$cat->name.'</h4>';

  // Get cat posts function
  jumpoff_get_cat_posts($postcat);
  
  // Get Section Footer Link
  if (is_home()) {
    echo '<a class="section-more-link" href="/blog/'.$postcat.'">See All '.$cat->name.'</a>';
  } else {
  // Get Section Footer Link
    echo '<a class="section-more-link" href="/blog/category/'.$postcat.'">See All '.$cat->name.'</a>';
  }
}


/*------------------------------------------------------*/
/*  Video Posts Module
/*  Get Posts by Video Post Format and Cat
/*  Use featured templatwe for first post
/*  Use aside template for remaining
/*  Adds wrapping markup
/*  
/*  @param:   $postcat (category_name slug) string
/*  @return:  $posts
/*  @todo:    replace echoed content with page templates
/*  @example: jumpoff_videos_module('category-name')
/*-------------------------------------------------------*/
function jumpoff_videos_module($postcat){
 global $post ; 
 
// if is home  
if ( is_home() ) {
  $postcat = null;
// else if is cat page  
} else {
  $postcat = $postcat;
}  
$args = array(
  'posts_per_page'   => 4,
  'category_name'    => $postcat,
  'tax_query' => array(
    array(
    'taxonomy' => 'post_format',
    'field' => 'slug',
    'terms' => array( 'post-format-video' ),
    'operator' => 'IN',
  ),
));
//Counter 
$counter = 1;
$posts = get_posts( $args );
foreach ( $posts as $post ) : setup_postdata( $post );

// First Post
if ($counter == 1) {
 echo '<div class="video-section--sssfeatured">';
  get_template_part( 'partials/content/content', 'category-video-featured' );
  echo '<h3 class="headline--normal"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
  echo '</div>'; 
  echo '<div class="video-section--aside">';
//Remaining Posts
} else {
  get_template_part( 'partials/content/content', 'category-video-aside' );
}
$counter++;
endforeach;
  echo '</div>'; 
wp_reset_postdata();

return $posts;
}

/*------------------------------------------------------*/
/*  Video Posts Module - Aside
/*  Get Posts by cat (via slug) in 'post-format-video' not in 'featured-video' taxonomy
/*  Use category-video-aside template to display
/* 
/*  @param:   $postcat (category_name slug) string
/*  @return:  $posts
/*  @example: jumpoff_videos_aside_module('category-name')
/*-------------------------------------------------------*/
function jumpoff_videos_aside_module($postcat){
 global $post ; 

  // if is home  
  if ( is_home() ) {
    $postcat = null;
  // else if is cat page  
  } else {
    $postcat = $postcat;
  }  
  $args = array(
    'posts_per_page'   => 3,
    'category_name'    => $postcat,
    'tax_query' => array(
      'relation' => 'AND',
      array(
        'taxonomy' => 'post_format',
        'field' => 'slug',
        'terms' => array( 'post-format-video' ),
        'operator' => 'IN',
      ),
      array(
        'taxonomy' => 'post-functions',
        'field' => 'slug',
        'terms' => array( 'featured-video' ),
        'operator' => 'NOT IN',
    ),
  ));

  $posts = get_posts( $args );
  foreach ( $posts as $post ) : setup_postdata( $post );
    get_template_part( 'partials/content/content', 'category-video-aside' );
  endforeach;
  wp_reset_postdata();
return $posts;
}

/*------------------------------------------------------*/
/*  Video Posts Module - Featured
/*  Get Posts by cat (via slug) in 'post-format-video' and 'featured-video' taxonomy
/*  Use category-video-featured template to display
/* 
/*  @param:   $postcat (category_name slug) string
/*  @return:  $posts
/*  @example: jumpoff_videos_featured_module('category-name')
/*-------------------------------------------------------*/
function jumpoff_videos_featured_module($postcat){
  global $post ; 

  // if is home  
  if ( is_home() ) {
    $postcat = null;
  // else if is cat page  
  } else {
    $postcat = $postcat;
  }  
  $args = array(
    'posts_per_page'   => 1,
    'category_name'    => $postcat,
    'tax_query' => array(
      'relation' => 'AND',
      array(
        'taxonomy' => 'post_format',
        'field' => 'slug',
        'terms' => array( 'post-format-video' ),
        'operator' => 'IN',
      ),
      array(
        'taxonomy' => 'post-functions',
        'field' => 'slug',
        'terms' => array( 'featured-video' ),
        'operator' => 'IN',
    ),
  ));
  $posts = get_posts( $args );
  foreach ( $posts as $post ) : setup_postdata( $post );
    get_template_part( 'partials/content/content', 'category-video-featured' );
  endforeach;
  wp_reset_postdata();
return $posts;
}

/*------------------------------------------------------*/
/*  Popular Posts - Track by page views
/*
/* Counts post views via setPostViews(get_the_ID()) on single.php
/* Then displays via args:
/*    'meta_key' => 'post_views_count',
/*    'orderby'  => 'meta_value_num',
/*
/*  @param:   $postID (post ID) 
/*  @return:  $count.' Views';
/*
/*-------------------------------------------------------*/
function getPostViews($postID){
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0 View";
  }
  return $count.' Views';
}

//Set Posts Views
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
      $count++;
      update_post_meta($postID, $count_key, $count);
  }
}

function first_img_featured(){
  $repeater = get_field('post_slider');
  $first_img = $repeater[0]['slider_image'];
}

?>