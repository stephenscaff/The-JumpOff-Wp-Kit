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
<a class='toggle-offcanvas'>
  <div class='menubars'></div>
</a>

<section class="offcanvas-bg">
<!-- Footer-nav -->
  <nav class='mobile-nav'>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/services">Services</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/blog">Blog</a></li>
    </ul>
  </nav>

  <!-- Footer-nav -->
  <footer class="footer-nav">
    <ul>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Instagram</a></li>
      <li><a href="#">Github</a></li>
    </ul>
  </footer> 
</section>

<!-- Header
================================================== -->
<header class="header-main">
 <div class="row">
    <!-- Logo -->
  <a href="/"><h1 id="logo">TheJumpOff</h1></a>

    <!-- Main Nav-->
  <nav role="navigation">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/about">About</a></li>
      <li><a href="/services">Services</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/blog">Blog</a></li>
    </ul>  
  </nav>
  </div>
</header>
