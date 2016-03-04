<?php
/**
 * Posts: Related
 *
 * The section for Related Posts.
 *
 * @author    Stephen Scaff and Constance Chen
 * @package   rjumpoff/content/posts-related
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<!-- Posts: Most Popular -->
<section class="section-related section--padded bg-light">
  <div class="row-xxl">
    <h5 class="section__heading cols">
      You Might Also Like
    </h5>
<?php
$cat = jumpoff_get_cat_slug();
$args = array(
  'post_type' => 'post',
  'category_name'    => $cat,
  'posts_per_page'   => 4,
  'orderby'          => 'date',
  'order'            => 'DESC',
  'post__not_in' => array($post->ID),
  'tax_query' => array()
);
 
$posts = get_posts( $args );
foreach ( $posts as $post ) : setup_postdata( $post );
  get_template_part( 'partials/content/content', 'posts' );
endforeach;
wp_reset_postdata();
?>

  </div>
</section>

