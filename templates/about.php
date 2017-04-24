<?php
/**
 * Template Name: About
 *
 * @author    Stephen Scaff
 * @package   page
 * @version   1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<!-- MAIN --> 
<main role="main">

<!-- MAST --> 
<section class="mast mast--page">
  <header class="mast__header">
    <h1 class="mast__title"><?php the_title(); ?></h1>
  </header>
</section>

</main>

<!-- FOOTER --> 
<?php get_footer(); ?>