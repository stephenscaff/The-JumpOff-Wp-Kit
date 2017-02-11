<?php
/**
 * Partial: partials/partial-header
 *
 * @author    Stephen Scaff
 * @package   jumpoff/partials/partial-header
 * @version    1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<body id="top" <?php body_class(); ?>>

<!-- Menu Small -->
<section class="site-menu-sm">

  <nav class='site-menu-sm__nav'>
    <ul>
      <li><a href="<?php jumpoff_page_url('home') ?>">Home</a></li>
      <li><a href="<?php jumpoff_page_url('work') ?>">Work</a></li>
      <li><a href="<?php jumpoff_page_url('about') ?>">About</a></li>
      <li><a href="<?php jumpoff_page_url('careers') ?>">Careers</a></li>
      <li><a href="<?php jumpoff_page_url('blog') ?>">News</a></li>
    </ul>
  </nav>
</section>

<!-- Header-->
<header class="site-header">
  <div class="grid-xl">
    <!-- Logo -->
    <a href="/" class="site-header__logo">
    <span class="">The JumpOff</span>
    </a>

    <a class='site-header__menu-toggle js-menu-toggle'>
      <div class='site-header__menu-bars'></div>
    </a> 
    <!-- Main Nav-->
    <nav role="navigation" class="site-header__nav">
      <ul>
        <li><a href="<?php jumpoff_page_url('home') ?>">Home</a></li>
          <li><a href="<?php jumpoff_page_url('work') ?>">Work</a></li>
          <li><a href="<?php jumpoff_page_url('about') ?>">About</a></li>
          <li><a href="<?php jumpoff_page_url('careers') ?>">Careers</a></li>
          <li><a href="<?php jumpoff_page_url('blog') ?>">News</a></li>
      </ul>  
    </nav>
  </div>
</header>
