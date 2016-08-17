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
/*  jumpoff_ft_posts()
/*
/*  Get Posts by term under custom taxonomy 'post-functions', 
/*
/*  @param:  $post_term = term under taxonomy 'post-functions'
/*  @param:  $num_posts = number of posts. use -1 for all.
/*  @param:  $content_type = content loop file name (all are prefixed with 'content-'')
/*  @return: $posts
/*  @example: jumpoff_ft_posts('featured', '10', 'feed')
/*-------------------------------------------------------*/
function jumpoff_ft_posts($post_term, $num_posts, $content_type){
  global $post ; 

  $args = array(
    'posts_per_page'   => $num_posts,
    'offset'           => 0,
    'tax_query' => array(
      array(
        'taxonomy' => 'post-functions',
        'field' => 'name',
        'terms' => $post_term,
      ),
    )
  );
  $posts = get_posts( $args );
  // set_transient( 'posts_query', $posts, 12 * 60 * 60 );
  foreach ( $posts as $post ) : setup_postdata( $post );
   get_template_part( 'partials/content/content', $content_type );
  endforeach;
  wp_reset_postdata();

  return $posts;
}

/*------------------------------------------------------*/
/*  jumpoff_cpts()
/*
/*  Get Custom Post Types
/*
/*  @param:  $post_type = name of custom post type
/*  @param:  $num_posts = number of posts. use -1 for all.
/*  @param:  $content_type = content loop file name (all are prefixed with 'content-'')
/*  @return: $posts
/*  @example: jumpoff_cpt('work', '-1', 'folio')
/*-------------------------------------------------------*/
function jumpoff_cpt($post_type, $num_posts, $content_type){
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