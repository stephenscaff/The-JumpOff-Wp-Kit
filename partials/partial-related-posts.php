<?php
/**
 * Posts: Related
 *
 * The section for Related Posts.
 *
 * @author    Stephen Scaff
 * @package   partials
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<section class="heading bg-lightgrey">
  <header class="grid-lg">
    <h2 class="heading__title">Related News</h2>
  </header>
</section>

<section class="posts pad bg-lightgrey">
  <div class="grid-xl">
    <div class="posts__grid">
<?php
$cat = jumpoff_get_cat_slug();
$args = array(
  'post_type' => 'post',
  'category_name'    => $cat,
  'posts_per_page'   => 3,
  'orderby'          => 'date',
  'order'            => 'DESC',
  'post__not_in' => array($post->ID),
  'tax_query' => array()
);
 
$posts = get_posts( $args );
foreach ( $posts as $post ) : setup_postdata( $post );
  get_template_part( 'partials/content/content', 'post' );
endforeach;
wp_reset_postdata();
?>
    </div>
  </div>
</section>

