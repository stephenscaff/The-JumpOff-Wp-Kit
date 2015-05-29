<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<!-- Hero-Section
================================================== -->
<section class="sect-mast sect-banner"></section>

<!-- Sect-form 
================================================== -->
<section id="form-section" class="sect-pad">
  <div class="row">
    <div class="eight columns centered">
    <?php echo do_shortcode( '[contact-form-7 id="120" title="Main Contact Form"]' ); ?> 
    </div>
  </div>
</section>

<!-- Footer
================================================== -->
<?php get_footer(); ?>


