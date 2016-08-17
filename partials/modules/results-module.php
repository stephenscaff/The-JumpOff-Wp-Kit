<!-- Results
================================================== -->  
<?php 
$results_facts = 'results-module-repeater';
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
?>
<section class="results">
  <div class="row-xl g-full">
    <header class="results__header">
    <?php if ($title) : ?><h3 class="results__title"><?php echo $title; ?></h3><?php endif; ?>
    <?php if ($subtitle) : ?><p class="results__subtitle"><?php echo $subtitle; ?></p><?php endif; ?>
    </header>
    <?php if ($results_facts) : ?>
    <div class="results__facts">
    <?php 
    while( have_rows($results_facts) ): the_row(); 
    $fact = get_sub_field('fact'); 
    $caption = get_sub_field('caption'); 
    ?>
    <figure class="results__fact fact">
      <span class="fact__numb"><?php echo $fact; ?></span>
      <figcaption class="fact__text"><?php echo $caption; ?></figcaption>
    </figure>
    <?php endwhile; ?>
    </div>
<?php endif; ?>
  </div>
</section>