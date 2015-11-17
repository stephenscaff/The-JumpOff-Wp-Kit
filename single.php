<?php
/**
 * The defualt tempalte for single posts.
 *
 * Using custom fields for main image.
 *
 * @author    Stephen Scaff
 * @package   jumpoff/page
 * @version   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); 

//var - For masthead image, via a cusotm field called 'masthead_image'
//$postImg = catch_that_image();
$mastImg = get_field('masthead_image');
$mastImgsize = 'full'; // (get full size)
$image_array = wp_get_attachment_image_src($mastImg, $mastImgsize);
// finally, extract and store the URL from $image_array
$image_url = $image_array[0];
?>

<!-- Main
================================================== -->
<main role="main" class="post-single">

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>


<!-- Article/Post
================================================== -->
<article class="sect-post" id="post-<?php the_ID(); ?>">

<!-- Sect: Mast
================================================== --> 
<section class="sect-mast center-all js-plax" style="background-image:url('<?php echo $image_url ?>');">
 <div class="vcenter">
  <div class="mast-content row">
    <div class="g-10 cols centered">
    <h1><?php the_title(); ?></h1>
    <?php if(get_field('post-subtitle')) { echo '<p class="post-subtitle">' . get_field('post-subtitle') . '</p>';} ?>
  </div>
  </div>
 </div>

 <div class="mast-credits row g-full">
  <p>Written by <?php the_author_posts_link(); ?> on <?php the_date(); ?></p>
 </div>
</section>

<!-- Article Content
================================================== -->
<section class="post-body sect-content">
  <div class="row">
			<?php the_content(); ?>
		</div>
</section>

<!-- Article Footer
================================================== -->
<footer class="post-footer">
 <div class="row">
  <ul class="post-footer-shares">
   <li><h5>Share</h5></li>
   <li><a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>"><span class="icon icon-twitter"></span></a></li>
   <li><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>/&amp;title=<?php the_title(); ?>"<span class="icon icon-fb"></span></a></li>
 	</ul>

 	<section class="post-footer-byline">
 		<h5><?php the_author_posts_link(); ?></h5>
 		<p><?php the_author_meta('description'); ?></p>
 		<a class="link-arrow" href="<?php bloginfo('url'); ?>/author/<?php the_author_meta( 'user_nicename' ); ?> ">View Posts</a>   
 	</section>
 </div>
	</footer>

<?php endwhile; // End the loop ?>
</article>

<!-- Sect: Read Next
================================================== -->
<?php include (TEMPLATEPATH . '/content/sect-next.php'); ?>


</main>


<!-- Footer
================================================== -->		
<?php get_footer(); ?>