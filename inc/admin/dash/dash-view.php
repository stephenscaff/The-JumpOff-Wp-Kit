<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *  Post Type: Clients
 *
 *  Slug : press-releases
 *  Supports : title','thumbnail', 'editor', 'excerpt'
 *
 *  @version    1.0
 *  @see        single-press-releases
 *  @see        archive-press-releases
 */

/** WordPress Administration Bootstrap */
require_once( ABSPATH . 'wp-load.php' );
require_once( ABSPATH . 'wp-admin/admin.php' );
require_once( ABSPATH . 'wp-admin/admin-header.php' );

?>

<section class="dash">

  <header class="dash-header">
    <h1 class="dash-header__title">Welcome to the your Site's CMS</h1>
    <p class="dash-header__text">From here you can create and manage the font-end experience.</p>
  </header>
  
  <section class="dash-cards">
    <article class="dash-card">
      <a class="dash-card__link" href="<?php echo admin_url( 'user-new.php' ); ?>">
        <div class="dash-card__content">
          <i class="dash-card__icon dashicons-testimonial"></i>

          <h3 class="dash-card__title">Create New Post</h3>

          <p class="dash-card__text">Create and write a new post for the blog</p>
        </div>
      </a>
    </article>


    <article class="dash-card">
      <a class="dash-card__link" href="<?php echo admin_url( 'partners.php' ); ?>">
        <div class="dash-card__content">
          <i class="dash-card__icon dashicons-edit"></i>

          <h3 class="dash-card__title">Manage Posts</h3>

          <p class="dash-card__text">Manage or edit your existing posts </p>
        </div>
      </a>
    </article>
  </section>

  <section class="dash-cards">
    <article class="dash-card">
      <a class="dash-card__link" href="<?php echo admin_url('post-new.php?post_type='); ?>">
        <div class="dash-card__content">
          <i class="dash-card__icon icon-notes"></i>

          <h3 class="dash-card__title">Create Post Type</h3>

          <p class="dash-card__text">Create a new Post Type.</p>
        </div>
      </a>
    </article>


    <article class="dash-card">
      <a class="dash-card__link" href="<?php echo admin_url( 'edit.php?post_type=' ); ?>">
        <div class="dash-card__content">
          <i class="dash-card__icon icon-cloud"></i>

          <h3 class="dash-card__title">Manage Partner Pages</h3>

          <p class="dash-card__text">Manage or edit existing Post Types. </p>
        </div>
      </a>
    </article>
  </section>
</section>
<?php //include( ABSPATH . 'wp-admin/admin-footer.php' );