<!DOCTYPE html>
<html lang="en">
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->

<head>
<!-- Title and Meta
================================================== -->
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><![endif]-->

<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
<meta name="author" content="Stephen Scaff">
<?php if(get_field('seo_description')): ?>
  <meta name="description" content="<?php the_field('seo_description');?>" />
<?php else: ?>
  <meta name="description" content="The JumpOff">
<?php endif; ?>
<?php if(get_field('seo_keywords')): ?>
  <meta name="keywords" content="<?php the_field('seo_keywords');?>" />
  <?php else: ?>
  <meta name="keywords" content="jumpoff ">
<?php endif; ?> 

<!-- Facebook Open Graph Meta
================================================== -->
<meta property="og:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>"/>
<meta property="og:url" content="<?php echo the_permalink() ?>"/>
<meta property="og:site_name" content="The JumpOff"/>
<?php if(get_field('seo_description')): ?>
  <meta property="og:description" content="<?php the_field('seo_description');?>" />
  <?php else: ?>
  <meta property="og:description" content="The JumpOff">
<?php endif; ?>
<?php if(is_single()) : ?>
  <meta property="og:image" content="<?php echo catch_that_image(); ?>"/>
  <?php else: ?>
  <meta property="og:image" content="<?php bloginfo('template_directory'); ?>/assets/images/screen.jpg"/>
<?php endif; ?>

<!-- Twitter Meta
================================================== -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>"/>
<meta name="twitter:url" content="<?php echo the_permalink() ?>">
<meta name="twitter:site" content="@jumpoff"/>
<meta name="twitter:creator" content="@https://twitter.com/jumpoff">
<meta name="twitter:domain" content="jumpoff"/>
<?php if(is_single()) : ?>
  <meta name="twitter:image" content="<?php echo catch_that_image(); ?>" />
  <?php else: ?>
  <meta name="twitter:image" content="<?php bloginfo('template_directory'); ?>/assets/images/screen.jpg"/>
<?php endif; ?>

<!-- Mobile
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale = 1, maximum-scale=1, user-scalable=no" />       

<!-- Fav and icons
================================================== -->  
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/ico" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-144x144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-114x114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-72x72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">

<!-- Feed
================================================== -->  
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

<!-- CSS & Js
================================================== -->
<?php wp_head(); ?>

<!-- Google Analytics
================================================== -->
<script> 
var _gaq = _gaq || [];
  _gaq.push(["_setAccount", "UA-12345678-X"]);
  _gaq.push(["_setDomainName", "vrge.com"]);
  _gaq.push(["_trackPageview"]);

  (function() {
    var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;
    ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
    var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!-- Script: Add fadein for page trans
================================================== -->
<script>
$('body').addClass('fade-in-page');
</script>
</head>

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
