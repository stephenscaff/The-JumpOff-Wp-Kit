<?php get_header(); ?>

<!-- Main
================================================== -->
<main role="main" class="post-single">

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>


<!-- Article/Post
================================================== -->
<article class="sect-post" id="post-<?php the_ID(); ?>">


<!-- Article header/hero
================================================== -->
	<header class="post-hero hero-noimg">
		<div class="row">
			<ul class="post-meta-tags"><li><?php the_category('</li><li>'); ?></li></ul>
	  <h1 class="post-title"><?php the_title(); ?></h1>
	  <?php if(get_field('post-subtitle')) { echo '<p class="post-subtitle">' . get_field('post-subtitle') . '</p>';} ?>
	  <div class="post-meta-byline">
			<img class="post-meta-avatar" src="<?php the_author_meta( 'profilepic' ); ?>" alt="post author"/>
			<p class="post-meta-credit">Written by <?php the_author_posts_link(); ?> on <?php the_date(); ?></p>
		</div>
	</header>

<!-- First Image
================================================== -->
	<figure>
		<img	src="<?php echo catch_that_image() ?>"	alt=""	/>
		<figcaption class="post-content">Here a little caption son to check caps</figcaption>
	</figure>

<!-- Article Content
================================================== -->
	<section class="post-content post-body">
		<?php the_content(); ?>
	</section>

<!-- Article Footer
================================================== -->
<footer class="post-content post-footer">
		<div class="socials">
			<a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>"><span class="icon icon-twitters"></span></a>
			<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>/&amp;title=<?php the_title(); ?>"<span class="icon icon-facebooks"></span></a>
	</div>

	<div class="post-footer-card">
		<p class="post-footer-title">Written By</p>  
			<img class="post-footer-avatar" src="<?php the_author_meta( 'profilepic' ); ?>"/>
				<div class="post-footer-info">
					<h4><?php the_author_posts_link(); ?></h4>
					<p><?php the_author_meta('description'); ?></p>
					<a class="link-arrow" href="<?php bloginfo('url'); ?>/author/<?php the_author_meta( 'user_nicename' ); ?> ">View Posts</a>           
			</div>
		</div>
</footer>

<!-- Sect: Read Next
================================================== -->
<?php include (TEMPLATEPATH . '/content-nextpost.php'); ?>
<?php endwhile; // End the loop ?>
	</article>
</main>


<!-- Footer
================================================== -->		
<?php get_footer(); ?>