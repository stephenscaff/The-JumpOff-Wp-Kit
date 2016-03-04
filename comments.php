<?php
/**
 * The template for displaying Comments (but use Disqus)
 *
 *
 * @author    Stephen Scaff
 * @package   jumpoff/archive
 * @version   1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
// don't load it if you can't comment
if ( post_password_required() ) {
  return;
}

?>

<?php // You can start editing here. ?>

  <?php if ( have_comments() ) : ?>

    <h3 class="comment__title"><?php comments_number( __( '<span>No</span> Comments', 'jumpoff' ), __( '<span>One</span> Comment', 'bonestheme' ), __( '<span>%</span> Comments', 'jumpoff' ) );?></h3>

    <section class="commentlist">
      <?php
        wp_list_comments( array(
          'style'             => 'div',
          'short_ping'        => true,
          'avatar_size'       => 40,
          'callback'          => 'jumpoff_comments',
          'type'              => 'all',
          'reply_text'        => __('Reply', 'jumpoff'),
          'page'              => '',
          'per_page'          => '',
          'reverse_top_level' => null,
          'reverse_children'  => ''
        ) );
      ?>
    </section>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav class="comment__nav" role="navigation">
      	<div class="comment__nav--prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'jumpoff' ) ); ?></div>
      	<div class="comment__nav--next"><?php next_comments_link( __( 'More Comments &rarr;', 'jumpoff' ) ); ?></div>
    	</nav>
    <?php endif; ?>

    <?php if ( ! comments_open() ) : ?>
    	<p class="no-comments"><?php _e( 'Comments are closed.' , 'jumpoff' ); ?></p>
    <?php endif; ?>

  <?php endif; ?>

  <?php comment_form(); ?>
