<?php
/*-----------------------------------------------*/
/* Pagination
/* For traditional pagination using a list of numbers
/*-----------------------------------------------*/
function jumpoff_pagination_list() {
  global $wp_query;

  $big = 999999999; // This needs to be an unlikely integer

  // For more options and info view the docs for paginate_links()
  // http://codex.wordpress.org/Function_Reference/paginate_links
  $paginate_links = paginate_links( array(
  'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
  'current' => max( 1, get_query_var('paged') ),
  'total' => $wp_query->max_num_pages,
  'mid_size' => 5,
  'prev_next' => True,
  'prev_text' => __('‹ Prev'),
  'next_text' => __('Next ›'),
  'type' => 'list'
  ));
 
  // Display the pagination if more than one page is found
  if ( $paginate_links ) {
    //echo '<div class="pagination__links">';
    echo $paginate_links;
    //echo '</div><!--// end .pagination -->';
  }
}


/*-----------------------------------------------*/
/* Pagination LInks Setup
/*-----------------------------------------------*/
function posts_link_class() {
    return 'class="pagination__link"';
}
add_filter('next_posts_link_attributes', 'posts_link_class');
add_filter('previous_posts_link_attributes', 'posts_link_class');

function posts_next_link_class() {
  return 'class="pagination__link--next"';
}
add_filter('next_posts_link_attributes', 'posts_next_link_class');

function posts_previous_link_class() {
    return 'class="pagination__link--previous"';
}
add_filter('previous_posts_link_attributes', 'posts_previous_link_class');

/*-----------------------------------------------*/
/* Pagination - Just Previous / Next instead of numbers
/*-----------------------------------------------*/
function jumpoff_pagination() {
  global $wp_query;

  if ( $wp_query->max_num_pages > 1 && is_home() ) : ?>
    <section class="pagination">
      <?php previous_posts_link( '
      <div class="pagination__content">
        <span class="pagination__title">Previous</span>

      </div>
      ' ); ?>

      <?php next_posts_link( '
      <div class="pagination__content ">
        <span class="pagination__title">Next</span>
      </div>
      ' ); ?>
    </section>
<?php elseif ( $wp_query->max_num_pages > 1 ) : ?>
    <section class="pagination pagination--dark">

      <?php previous_posts_link( '
      <div class="pagination__content">
        <span class="pagination__title">Previous</span>

      </div>
      ' ); ?>

      <?php next_posts_link( '
      <div class="pagination__content">
        <span class="pagination__title">Next</span>

      </div>
      ' ); ?>

    </section>

<?php endif;
} ?>




?>