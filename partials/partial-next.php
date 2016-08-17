
<?php
/**
 * Section: Next Post
 *
 * @author    Stephen Scaff
 * @package   jumpoff/content/sect-next
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<?php
$previous_post = get_adjacent_post(false, '', false); 
$next_post = get_adjacent_post(false, '', true);
$post_type = get_post_type( get_the_ID() );
?>

<?php if ($next_post): // if there are newer articles ?>
  <article class="card card--next" data-scroll="stagger-up">
    <a class="card__link" href="<?php echo get_permalink($next_post); ?>">
    <figure class="card__bg" style="background-image: url(<?php jumpoff_ft_img('fullsize', $next_post); ?>)"> </figure>
        <header class="card__header">
          <span class="card__subtitle">Up Next</span>
          <h2 class="card__title"><?php echo get_the_title($next_post); ?></h2>
        </header>
    </a>
  </article>

<?php else: 
  $cat = jumpoff_get_cat_slug();
  $args = array(
    'post_type' => $post_type,
    'posts_per_page'   => 1,
    'orderby'          => 'menu_order',
    'order'            => 'DESC',
  );
  $posts = get_posts( $args );
  foreach ( $posts as $post ) : setup_postdata( $post ); ?>
  <article class="card card--next" data-scroll="stagger-up">
    <a class="card__link" href="<?php echo get_permalink(); ?>">
    <figure class="card__bg" style="background-image: url(<?php jumpoff_ft_img('fullsize'); ?>)"> </figure>
        <header class="card__header">
          <span class="card__subtitle">Up Next</span>
          <h2 class="card__title"><?php echo get_the_title(); ?></h2>
        </header>
    </a>
  </article>
  <?php endforeach;
  wp_reset_postdata();
?>
<?php endif; ?>