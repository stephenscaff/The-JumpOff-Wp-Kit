<?php
/*-----------------------------------------------*/
/* Taxonomies and Categories:
/* Funcitons and helpers related to working with or retrieving cats and taxes.
/*-----------------------------------------------*/

/*-----------------------------------------------*/
/*  jumpoff_get_cats()
/*  @description: Get a list of the posts cats
/*  @example:     jumpoff_get_cats()
/*-----------------------------------------------*/
function jumpoff_cat_list() {
  $args = array(
    'orderby' => 'name',
    'parent' => 0
  );
  $categories = get_categories( $args );
  if ( $categories ) {
    foreach ( $categories as $category ) {
     echo( '<ul><li><a class="post-cats__cat" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></li></ul>');
    }
  }
}

/*-----------------------------------------------*/
/*  jumpoff_tax_list()
/*  @description: echos taxonomy list
/*-----------------------------------------------*/
function jumpoff_tax_list($taxonomy) {
$terms = get_terms($taxonomy);
 if ($terms) {
    foreach ( $terms as $term ) {
      $list_item = '<li>' . $term->slug . '</li>';
      echo $list_item;
    }
  }
}

/*-----------------------------------------------*/
/*  jumpoff_cats_unlinked
/*  
/*  @description:   Get Unlinked category namea, to output as classes
/*                  (for filtering & sorting & modifiers and so on. Or pass in a seperator for other stuff)
/*  @example:       <li class="<? echo jumpoff_cats_unlinked ?>">
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
/*  jumpoff_tax_unlinked()
/*  @description: ouputs unlinked taxonomies, for use with js filters
/*
/*  @param: $taxonomy = the taxonomy use want to pull from.
/*-----------------------------------------------*/
function jumpoff_tax_unlinked($taxonomy) {
  $terms = get_terms($taxonomy);
  if ($terms) {
    foreach ( $terms as $term ) {
      echo strtolower ($term->slug) . ' ';
    }
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


?>