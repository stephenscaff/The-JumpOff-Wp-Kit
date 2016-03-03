<?php
/*-----------------------------------------------*/
/*  POST LOOPS & QUERIES FUNCTIONS:
/*  01. Modular Get Posts Function
/*  02. EXAMPLE: Get Posts by Cat, using 2 templates (featured and list)
/*  03. EXAMPLE: Get Posts Cat Module
/*  04. EXAMPLE: Get Posts Video Module
/*  05. Popular Posts Functions - view counter and display
/*-----------------------------------------------*/
/*------------------------------------------------------*/
/*  jumpoff_get_posts();
/*
/*  Modular Get Posts Function
/*
/*  @params:  $post_cat = ('category-nicename' or null for all posts), 
/*            $num_posts = number of posts to show
/*            $content_type = file name for content, ie; 'posts' = partials/content/content-posts
/*
/*  @return:  $posts
/*  @example: jumpoff_get_posts('category-name', 7) or jumpoff_get_posts(null, 7) 
/*-------------------------------------------------------*/
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
/*------------------------------------------------------*/
/*  jumpoff_get_posts_ft_list()
/*
/*  Get Posts by cat, 
/*  Use featured template for first post
/*  Use micro template for remaining via a simple counter
/*
/*  @param:   $postcat (category_name slug)
/*  @return:  $posts
/*  @example: jumpoff_get_cat_posts('category-name') or jumpoff_get_cat_posts($cat) 
/*-------------------------------------------------------*/
function jumpoff_get_posts_ft_list($post_cat, $num_posts){
  global $post ; 
  $args = array(
   'posts_per_page'   => $num_posts,
   'offset'           => 0,
   'category_name'    => $post_cat,
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
/*  EXAMPLE: Jumpoff Category Module
/*  Wraps the 'jumpoff_get_cat_posts()' funciton with a header and footer via page templates
/* 
/*  @param:   $postcat (category_name slug) string
/*  @example: jumpoff_cat_module('category-name')
/*-------------------------------------------------------*/
function jumpoff_cat_module($postcat){
  $cat = get_term_by( 'slug', $postcat, 'category');
  // Get Section Heading
  echo '<h4>'.$cat->name.'</h4>';

  // Get cat posts function
  jumpoff_get_posts_ft_list($postcat);
  
  // Get Section Footer Link
  if (is_home()) {
    echo '<a class="more__link" href="/blog/'.$postcat.'">See All '.$cat->name.'</a>';
  } else {
  // Get Section Footer Link
    echo '<a class="more__link" href="/blog/category/'.$postcat.'">See All '.$cat->name.'</a>';
  }
}



/*------------------------------------------------------*/
/*  EXAMPLE: umpoff_get_featured_videos

/*  Get featured Video format posts
/* 
/*  @param:   $postcat (category_name slug) string
/*  @return:  $posts
/*  @example: jumpoff_videos_featured_module('category-name')
/*-------------------------------------------------------*/
function jumpoff_get_featured_videos($post_cat, $num_posts){
  global $post ; 

  // if is home  
  if ( is_home() ) {
    $postcat = null;
  // else if is cat page  
  } else {
    $postcat = $postcat;
  }  
  $args = array(
    'posts_per_page'   => $num_posts,
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
    get_template_part( 'partials/content/content', 'video' );
  endforeach;
  wp_reset_postdata();
  
  return $posts;
}

/*------------------------------------------------------*/
/*  Popular Posts - Track by page views
/*
/* Counts post views by adding jumpoff_set_post_views(get_the_ID()) on single.php
/* Then displays via args:
/*    'meta_key' => 'post_views_count',
/*    'orderby'  => 'meta_value_num',
/*
/*  @param:   $postID (post ID) 
/*  @return:  $count.' Views';
/*-------------------------------------------------------*/
function jumpoff_get_post_views($postID){
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
function jumpoff_set_post_views($postID) {
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


?>