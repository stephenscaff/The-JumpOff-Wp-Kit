<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 *   Pagination List
 *   For more traditional paginations
 *
 *   @param    string $page_name
 *   @return   string 'is-active';
 */
function jumpoff_pagination_list() {
  global $wp_query;

  // This needs to be an unlikely integer
  $big = 999999999; 

  // http://codex.wordpress.org/Function_Reference/paginate_links
  $paginate_links = paginate_links( array(
    'base'      => str_replace( $big, '%#%', get_pagenum_link($big) ),
    'current'   => max( 1, get_query_var('paged') ),
    'total'     => $wp_query->max_num_pages,
    'mid_size'  => 5,
    'prev_next' => True,
    'prev_text' => __('‹ Prev'),
    'next_text' => __('Next ›'),
    'type'      => 'list'
  ));
 
  // Display the pagination if more than one page is found
  if ( $paginate_links ) {
    echo $paginate_links;
  }
}

/**
 *  Pagination Link Classes
 *  @todo clean this shit up. Make classes or group functions
 */
function posts_link_class() {
  return 'class="pagination__link"';
}
add_filter('next_posts_link_attributes', 'posts_link_class');
add_filter('previous_posts_link_attributes', 'posts_link_class');

/**
 *   Pagination Next Link Classes
 */
function posts_next_link_class() {
  return 'class="pagination__link--next"';
}
add_filter('next_posts_link_attributes', 'posts_next_link_class');

/**
 *   Pagination Previous Link Classes
 */
function posts_previous_link_class() {
    return 'class="pagination__link--previous"';
}
add_filter('previous_posts_link_attributes', 'posts_previous_link_class');

/**
 *  Pagination
 *  Next/Last instead of numeric
 *  @todo clean this shit up
 */
function jumpoff_pagination() {
  global $wp_query;
  $class = '';
  if ( !is_paged() ) {
  $class = 'pagination--first';
}
  if ( $wp_query->max_num_pages > 1 ) { ?>
    <section class="pagination <?php echo $class; ?>">
      <?php previous_posts_link( '
      <div class="pagination__content">
        <span class="pagination__meta">Previous</span>
      </div>
      ' ); ?>

      <?php next_posts_link( '
      <div class="pagination__content ">
        <span class="pagination__meta">Next</span>
      </div>
      ' ); ?>
    </section>
<?php }
} ?>