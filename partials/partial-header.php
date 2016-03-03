<?php
/**
 * Partial: partials/partial-header
 *
 * @author    Stephen Scaff
 * @package   jumpoff/partials/partial-header
 * @version    1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<body id="top" <?php body_class(); ?>>

<!-- Mobile Nav
================================================== -->
<!-- Nav Toggle -->
<a class='offcanvas-toggle js-offcanvas-toggle'>
  <div class='offcanvas-toggle__menubars'></div>
</a>

<section class="offcanvas-menu">
  <!-- Footer-nav -->
  <nav class='offcanvas-menu__nav'>
    <ul>
      <li><a href="<?php jumpoff_page_link('home'); ?>">Home</a></li>
      <li><a href="<?php jumpoff_page_link('about'); ?>">About</a></li>
      <li><a href="<?php jumpoff_page_link('services'); ?>">Services</a></li>
      <li><a href="<?php jumpoff_page_link('blog'); ?>">Blog</a></li>
    </ul>
  </nav>
</section>

<!-- Header
================================================== -->
<header class="site-header">
  <div class="row">
    <!-- Logo -->
    <a href="/" class="site-header__logo">
      JumpOff
    </a>

    <!-- Main Nav-->
    <nav role="navigation" class="site-header__nav">
      <ul>
        <li><a href="<?php jumpoff_page_link('home'); ?>">Home</a></li>
        <li><a href="<?php jumpoff_page_link('about'); ?>">About</a></li>
        <li><a href="<?php jumpoff_page_link('services'); ?>">Services</a></li>
        <li><a href="<?php jumpoff_page_link('blog'); ?>">Blog</a></li>
      </ul>  
    </nav>
  </div>
</header>
