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

//vars 
$post_type = get_sub_field('post_type');
$posts_number = get_sub_field('posts_number');
$show_link = get_sub_field('show_link');
$link_text = get_sub_field('archive_link_text');
$opt_id = get_sub_field('option_id');
$opt_class = get_sub_field('option_class');
?>

<?php if ($post_type ==  'portfolio') : ?>      

<!-- PORTFOLIO -->
<section class="folios">
  <div id="portfolio" class="folio__grid" data-scroll="stagger-up">

<?php elseif ($post_type ==  'team') : ?>

<!-- TEAM -->
<section id="team" class="teams <?php if ($opt_class) : echo $opt_class; endif; ?>">
  <div class="teams__grid" data-scroll="stagger-up">

<?php else : ?>

<!-- POSTS -->
<section class="posts">
  <div class="grid-lg">
    <div class="posts__grid">

<?php endif; ?>
<?php
global $post ; 
$args = array(
    'post_type' => $post_type,
    'posts_per_page'   => $posts_number,
    'orderby'          => 'date',
    'order'            => 'DESC',
  );
  $posts = get_posts( $args );
  foreach ( $posts as $post ) : setup_postdata( $post );
    get_template_part( 'partials/content/content', $post_type );
  endforeach;
  wp_reset_postdata();
?>
<?php if ($post_type ==  'portfolio' || $post_type == 'team') : ?>
  </div>
</section>

<?php else : ?>
    
    </div> 
  </div>
</section>

<?php endif; ?>

<?php // Show Archive Link

if ($show_link && $post_type != 'team') : ?>

<?php 
//$noun = 'Posts';

} elseif ($post_type == 'portfolio') {
  
  $link = jumpoff_page_url('portfolio', '1');

} elseif ($post_type == 'team') {

  $link = jumpoff_page_url('about', '1')/'#team';

} else {

  $link = jumpoff_page_url('blog');
}
?>

<section class="cta">
  <a class="cta__link" href="<?php echo $link; ?>">
    <span class="btn-link btn--white"><span><?php echo $link_text; ?></span>
  </a>
</section>
<?php endif; ?>
