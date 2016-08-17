<?php
/**
 * Posts: Related
 *
 * The section for Related Posts.
 *
 * @author    Stephen Scaff
 * @package   jumpoff/content/posts-related
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<!-- Posts: Most Popular -->
<section class="intro">
  <header class="intro__header">
    <h3 class="intro__title">
      You Might Also Like
    </h3>
  </header>
</section>
<section class="related">
  <div class="grid-xl">
    <div class="related__grid">
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
  </div>
</section>

