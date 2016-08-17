<!-- Video
================================================== -->  
<?php 
$audio_module = 'audio-module-repeater';

if ($audio_module) : ?>
<section class="audio-grid">
  <div class="row-xl g-full">
    <header class="audio-grid__header">
      <h3>Radio</h3>
    </header>

    <div class="audio-grid__players">
    <?php
    $counter = 1; 
    while( have_rows($audio_module) ): the_row(); 
    
    $audio_title = get_sub_field('audio-module-title'); 
    $audio_file = get_sub_field('audio-module-file'); ?>
    <div class="audio-grid__item">
      <div class="audio-player">  
        <h5 class="audio-player__title">
          <span class="audio-player__count">0<?php echo $counter; ?></span>  
          <span class="audio-player__title"><?php echo $audio_title; ?></span>
        </h5>     
        <audio src="<?php echo $audio_file; ?>"></audio>
      </div>
    </div>
  <?php 
  $counter++; 
  endwhile; 
  ?>
    </div>
  </div>
</section>
<?php endif; ?>
