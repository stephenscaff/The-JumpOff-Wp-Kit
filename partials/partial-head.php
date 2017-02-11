<?php
/**
 * Partial: partials/partial-head
 *
 * @author    Stephen Scaff
 * @package   jumpoff/partials/partial-head
 * @version   1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<!DOCTYPE html>
<html lang="en">
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><![endif]-->

<?php
// Meta/OG variables
$meta_title = get_post_meta( get_the_ID(), 'seo_title', true ) ? get_post_meta( get_the_ID(), 'seo_title', true ) : wp_title('|', false, 'right') . get_bloginfo('name');
$meta_author = "Urban Influence";
$meta_site_name = get_bloginfo('name') .' - '. get_bloginfo('description');
$meta_description = get_post_meta( get_the_ID(), 'seo_description', true ) ? get_post_meta( get_the_ID(), 'seo_description', true ) : "Urban Influence is.";
?>

<!-- Title and Meta-->
<title><?php echo $meta_title ?></title>
<meta name="author" content="<?php echo $meta_author ?>">
<meta name="description" content="<?php echo $meta_description ?>">

<!-- Facebook Open Graph Meta-->
<meta property="og:title" content="<?php echo $meta_title ?>">
<meta property="og:url" content="<?php echo the_permalink() ?>">
<meta property="og:site_name" content="<?php echo $meta_site_name ?>">
<meta property="og:description" content="<?php echo $meta_description ?>">
<meta property="og:image" content="<?php jumpoff_ft_img('large'); ?>">

<!-- Twitter Meta -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:title" content="<?php wp_title('|', true, 'right'); bloginfo('name'); ?>"/>
<meta name="twitter:url" content="<?php echo the_permalink() ?>">
<meta name="twitter:site" content="@pigeonwisdom"/>
<meta name="twitter:creator" content="https://twitter.com/pigeonwisdom">
<meta name="twitter:domain" content="http://urbaninfluence.com"/>
<meta name="twitter:image" content="<?php jumpoff_ft_img('large'); ?>" />

<!-- Mobile -->
<meta name="viewport" content="width=device-width, initial-scale = 1, maximum-scale=1" />       

<!-- Fav and icons -->  
<link rel="shortcut icon" href="<?php jumpoff_img(); ?>/favicon.ico" type="image/ico" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php jumpoff_img(); ?>/fav-152.png">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php jumpoff_img(); ?>/fav-120.png">
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?php jumpoff_img(); ?>/fav-60.png">
<link rel="apple-touch-icon-precomposed" href="<?php jumpoff_img(); ?>/fav-152.png">

<!-- Feed -->  
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

<!-- CSS & Js -->
<?php wp_head(); ?>

</head>
