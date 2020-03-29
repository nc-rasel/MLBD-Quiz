<div class="wrap">
<h1 class="wp-heading-inline">Event results</h1>

<?php
  $events = get_posts(
    array(
      'numberposts' => -1,
      'post_type' => 'event',
      'post_status' => 'publish',
      'orderby' => 'date',
      'order' => 'asc',
    )
  );
  ?> 
  <ul class="events_list">
  <?php foreach($events as $key => $event){ ?>
    <li><a href="<?= admin_url('/admin.php?page=events%2Fresult.php&post_id=' . $event->ID ); ?>" class="text-decoration-none"><?= get_the_title($event->ID); ?></a></li>
  <?php }  ?>
  </ul>

</div>