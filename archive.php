<?php
/**
 * Template for general posts archives.                                                                                                               n
 *
 * @author    Stephen Scaff
 * @package   page
 * @version   2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<!-- MAIN --> 
<main role="main" class="">

<!-- Mast -->
<?php get_template_part( 'partials/partial', 'mast' );?>

<!-- Posts -->
<?php get_template_part( 'partials/partial', 'posts' ); ?>

<!-- Pagination -->
<?php get_template_part( 'partials/posts', 'pagination' );?>

</main>

<!-- Footer  --> 
<?php get_footer(); ?>