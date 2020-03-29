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

foreach($events as $key => $event){ ?>
<h3 class="event-name"><?= get_the_title($event->ID); ?></h3>
<table class="result-event-table">

<?php $questions = (int)get_post_meta($event->ID, 'questions', true); ?>
  <thead >
    <tr>
      <?php for($i = 0; $i < $questions; $i++){  ?>
        <th><?=  $i . ': ' . get_post_meta($event->ID, 'questions_'. $i .'_question', true); ?> ?</th>
      <?php  } ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php for($i = 0; $i < $questions; $i++){  ?>
        <td>
        <?php $answers = get_post_meta($event->ID, 'questions_'. $i .'_question_ans', false); 
          foreach( $answers as $index => $value){
            $answer = explode('#', $value);
            echo '<div class="answer">' .$answer[0] . '<br> <small>- by ' . $answer[1] . '</small> </div>';
          }?>
        </td>
    <?php  } ?>
    </tr>
  </tbody>
</table>
<?php }

?>
</div>