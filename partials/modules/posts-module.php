<?php
/**
* Posts module
*
* The module for adding posts or post type sections.
*
* @author       Stephen Scaff
* @package      SandP
* @see          kit/scss/components/_sliders.scss
* @version      1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post ; 

//vars 
$title = get_sub_field('heading_title');
$bg_color = get_sub_field('bg_color');
$post_type = get_sub_field('post_type');
$posts_number = get_sub_field('posts_number');
$archive_link = get_sub_field('archive_link');
$ft_or_recent = get_sub_field('featured_or_recent');
$tax_query='';

// Get Related Resources for Industries
if ($ft_or_recent == 'featured'){

  $tax_query = array(
    'taxonomy'    => 'post-functions',
    'field'       => 'slug',
    'terms' => array( 'featured' ),
    'operator'    => 'IN',
  );
} 

$args = array(
  'post_type' => $post_type,
  'posts_per_page'   => $posts_number,
  'orderby'          => 'date',
  'order'            => 'DESC',
  'tax_query'       => array($tax_query),
);

$posts = get_posts( $args );

if ($posts && $title) : ?>

<section id="<?php echo $post_type; ?>" class="heading <?php if ($bg_color) : echo $bg_color; endif ?>" data-scroll-index="">
  <header class="grid-lg">
    <h2 class="heading__title"><?php echo $title; ?></h2>
  </header>
</section>

<?php endif; if ($posts) : ?>

<!-- Posts-->
<section class="posts pad <?php if ($bg_color) : echo $bg_color; endif ?>">
  <div class="grid-xl">
    <div class="posts__grid">
<?php
  foreach ( $posts as $post ) : setup_postdata( $post );
    get_template_part( 'partials/content/content', $post_type );
  endforeach;
  wp_reset_postdata();
?>
    </div>
  </div>
</section>

<?php endif; if ($archive_link) : ?>

<!-- View Moore -->
<section class="view-more">
  <div class="view-more__content grid-xl">
    <a class="btn-line btn--beta" href="<?php echo jumpoff_term_link('blog', 'content-types'); ?>">View All</a>
  </div>
</section>
<?php endif; ?>