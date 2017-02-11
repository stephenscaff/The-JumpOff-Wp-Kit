<?php

/**
 *  jumpoff_get_posts();
 *
 *  Modular Get Posts Function
 *
 *  @param    string $post_cat = ('category-nicename' or null for all posts)
 *  @param    int  $num_posts = number of posts to show
 *  @param    string $content_type = file name for content, ie; 'posts' = partials/content/content-posts
 *  @example  jumpoff_get_posts('category-name', 7) or jumpoff_get_posts(null, 7) 
 *  @return   $posts
 */ 

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
 *  jumpoff_ft_posts()
 *
 *  Get Posts by term under custom taxonomy 'post-functions', 
 *
 * @param    string $$post_term = term under taxonomy 'post-functions'
 * @param    int  $num_posts = number of posts. use -1 for all.
 * @param    string $content_type = content loop file name (all are prefixed with 'content-'')
 * @example  jumpoff_ft_posts('featured', '10', 'feed')
 * @return   $posts
 */ 
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

/**
 *  jumpoff_cpts()
 *
 *  Get Posts by custom post type
 *
 * @param    string $post_type The Post Type
 * @param    int  $num_posts  Number of posts. use -1 for all.
 * @param    string  $content_type Content loop file name (all are prefixed with 'content-'')
 * @example  jumpoff_cpts('team', '10', 'team')
 * @return   $posts
 */ 

function jumpoff_cpts($post_type, $num_posts, $content_type){
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

/**
 *  jumpoff_cpt_tax()
 *
 *  Get Posts by custom post type
 *
 * @see      partials-content-products.php For useage
 * @param    string  $post_type The Post Type
 * @param    string  $tax   The taxonomy
 * @param    string  $term  The Term
 * @param    int     $num_posts  Number of posts. use -1 for all.
 * @param    string  $content_type Content loop file name (all are prefixed with 'content-'')
 * @example  jumpoff_cpt_tax('products', 'product-categories', $term, -1, 'products');
 * @return   $posts
 */ 
function jumpoff_cpt_tax($post_type, $tax, $term, $num_posts, $content_type){
  global $post ; 

  $args = array(
    'posts_per_page'   => $num_posts,
    'post_type'        => $post_type,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'tax_query' => array(
      array(
        'taxonomy' => $tax,
        'field' => 'slug',
        'terms' => array( $term ),
        'operator' => 'IN',
        ),
    ),
  );
  //$counter = 1;
  $posts = get_posts( $args );
  // set_transient( 'posts_query', $posts, 12 * 60 * 60 );
  foreach ( $posts as $post ) : setup_postdata( $post );
   get_template_part( 'partials/content/content', $content_type );
  //$counter++; 
  endforeach;
  wp_reset_postdata();

  return $posts;
}
