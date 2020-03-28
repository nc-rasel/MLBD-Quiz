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

<div class="welcome-popup-wrapper">
  <div class="welcome-popup">
    <div class="welcome-popup-inner">
      <h3>Welcome</h3>
      <form action="" method="POST" id="welcome-form">
        <label for="user_name">Your Name:</label>
        <input type="text" name="user_name" id="user_name" value="">
        <input type="submit" name="submit" id="submit" value='submit'>
      </form>
    </div>
  </div>
</div>
<?php get_footer(); ?>