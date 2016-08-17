<!-- Video
================================================== -->  
<?php 
$vid_module = 'video-module-repeater';

if ($vid_module) : ?>
<section class="vid-grid">
  <?php 
  while( have_rows($vid_module) ): the_row(); 
  $vid = get_sub_field('video-module-item'); ?>
  <div class="vid-grid__item flex-vid"><?php echo $vid ?></div>
<?php endwhile; ?>
</section>
<?php endif; ?>
