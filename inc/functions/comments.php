<?php
// Comment Layout
function jumpoff_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="comment">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=90" class="comment__avatar load-gravatar avatar" height="90" width="90" src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar-default.jpg" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="comment__cite">%1$s</cite> %2$s', 'jumpoff' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'jumpoff' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'jumpoff' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="comment__alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'jumpoff' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment__content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!




/*---------------
Markup for comments without, dis
<!--
  <?php if ( have_comments() ) : ?>

    <h3 class="comment__title"><?php comments_number( __( '<span>No</span> Comments', 'jumpoff' ), __( '<span>One</span> Comment', 'jumpoff' ), __( '<span>%</span> Comments', 'jumpoff' ) );?></h3>

    <section class="commentlist">
      <?php
        wp_list_comments( array(
          'style'             => 'div',
          'short_ping'        => true,
          'avatar_size'       => 90,
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
-->
----------------------*/
?>