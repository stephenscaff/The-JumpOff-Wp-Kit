<?php
/**
 * Template Name: Home
 *
 * @author    Stephen Scaff
 * @package   page
 * @version   2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<!-- Main -->
<main role="main">
  
<?php get_template_part( 'partials/partial-modules' ); ?>

</main>

<!-- Footer --> 
<?php get_footer(); ?>