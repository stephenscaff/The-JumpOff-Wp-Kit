<?php get_header(); ?>

<!-- Archive hero
================================================== -->
<section class="sect-archive-hero">
  <div class="row">
    <div class="g-7 cols center-all">
      <img class="post-archive-avatar" src="<?php the_author_meta( 'profilepic' ); ?>"/>
      <h2><?php $author = get_userdata(get_query_var('author'));?>      
      <?php echo htmlspecialchars($author->display_name);?></h2>
      <p><?php the_author_meta('description'); ?></p>
      <!--<?php if (is_day()) : ?>
      <?php else : ?>
      <?php single_cat_title(); ?>
      <?php endif; ?>-->
    </div>
</div>
</section>

<!-- Blog Posts Grid
================================================== -->
<section class="sect-posts-simple">
  <div class="row">
    <div class="g-7 cols centered">

    <div class="posts-title-rule"><?php the_author() ?> Has <?php the_author_posts(); ?> Posts</div>
    	<?php if ( have_posts() ) : ?>
    	  <?php /* Start the Loop */ ?>
    	    <?php while ( have_posts() ) : the_post(); ?>
    	    <?php get_template_part( 'content-simple', get_post_format() ); ?>
    	    <?php endwhile; ?>
    	    <?php else : ?>
    	  <?php get_template_part( 'content-simple', 'none' ); ?>
    	<?php endif; // end have_posts() check ?>
    </div>
  </div>
</section>

<!-- Pagination-Section
================================================== -->	
<?php include (TEMPLATEPATH . '/sect-signup.php'); ?>

<!-- Pagination-Section
================================================== -->	
<section class="sect-postnav sect-dark">
 <div class="block-wrap  bg-alpha cf">
  <div class="block-half bg-alpha-drk">
      <div>
        <?php next_posts_link( '<span class="icon-chev-left"></span> Older posts' ); ?>
      </div>
    </div>  
  
  <div class="block-half">
    <div>
      <?php previous_posts_link( 'Newer posts <span class="icon-chev-right"></span>' ); ?>
    </div>
  </div> 
</div>
</section>
		
<?php get_footer(); ?>