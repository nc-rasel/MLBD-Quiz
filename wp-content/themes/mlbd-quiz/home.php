<?php 

get_header();
$events = get_posts(
  array(
    'numberposts' => -1,
    'post_type' => 'event',
    'post_status' => 'publish',
  )
);
?>
<section class="all_events">
<?php foreach($events as $key => $value){ ?>
  <div class="event">
  <a class="text-decoration-none" href="<?= get_the_permalink($value); ?>"> <?= get_the_title($value); ?> </a>
  </div>
<?php } ?>
</section>



<?php get_footer(); ?>