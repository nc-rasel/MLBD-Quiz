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

<div class="wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h1 class="display-4 text-center">WELCOME</h1>
        </div>
        <form action="" method="POST" id="welcome-form">
          <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
              <label class="input-group-text" for="user_name" id="addon-wrapping">Your Name</label>
            </div>
            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Your Name" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
          <br />
          <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>