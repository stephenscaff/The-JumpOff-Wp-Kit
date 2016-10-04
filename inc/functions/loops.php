<?php
/*-----------------------------------------------*/
/*  POST LOOPS & QUERIES FUNCTIONS:
/*-----------------------------------------------*/

/**
*  jumpoff_get_posts()
*  Modular Get Posts Function
*  
* @param:   $post_cat = ('category-nicename' or null for all posts),
* @param:   $num_posts = number of posts to show
* @param:   $content_type = file name for content, ie; 'posts' = partials/content/content-posts
* @return:  $posts
* @example: jumpoff_get_posts('category-name', 7) or jumpoff_get_posts(null, 7) 
**/ 
function jumpoff_get_posts($post_cat, $num_posts, $content_type){
  global $post ; 

  $args = array(
   'posts_per_page'   => $num_posts,
   'offset'           => 0,
   'category_name'    => $post_cat,
  );

  $posts = get_posts( $args );
  // set_transient( 'posts_query', $posts, 12 * 60 * 60 );
  foreach ( $posts as $post ) : setup_postdata( $post );
    //Get template form partials/content/content-category-featured
   get_template_part( 'partials/content/content', $content_type );

  endforeach;
  wp_reset_postdata();

  return $posts;
}


/**
*  jumpoff_cpts()
*  Get Custom Post Types
*  
* @param:  $post_type = name of custom post type
* @param:  $num_posts = number of posts. use -1 for all.
* @param:  $content_type = content loop file name (all are prefixed with 'content-'')
* @return: $posts
* @example: jumpoff_cpt('work', '-1', 'folio')
**/ 
function jumpoff_cpt($post_type, $num_posts, $content_type){
  // import global post object
  global $post ; 

  $args = array(
    'posts_per_page'   => $num_posts,
    'post_type'        => $post_type,
    'orderby'          => 'date',
    'order'            => 'DESC',
  );
  $counter = 1;
  $posts = get_posts( $args );
  // set_transient( 'posts_query', $posts, 12 * 60 * 60 );
  foreach ( $posts as $post ) : setup_postdata( $post );
   get_template_part( 'partials/content/content', $content_type );
  $counter++; 
  endforeach;
  wp_reset_postdata();

  return $posts;
}



/*------------------------------------------------------*/
/*  Popular Posts - Track by page views
/*
/* Counts post views by adding setPostViews(get_the_ID()) on single.php
/* Then displays via args:
/*    'meta_key' => 'post_views_count',
/*    'orderby'  => 'meta_value_num',
/*
/*  @param:   $postID (post ID) 
/*  @return:  $count.' Views';
/*  
/*
/*-------------------------------------------------------
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
*/
?>