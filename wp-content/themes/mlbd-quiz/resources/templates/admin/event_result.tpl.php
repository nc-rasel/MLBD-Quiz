<div class="wrap">
<h1 class="wp-heading-inline">Event results</h1>
<a href="<?= admin_url('/admin.php?page=events%2Fresult.php' ); ?>" class="page-title-action">Back to results</a>
<hr class="wp-header-end">


<?php $eventID = $_GET['post_id']; ?>
  <h3 class="event-name"><?= get_the_title($eventID); ?></h3>
<table class="result-event-table">

<?php $questions = (int)get_post_meta($eventID, 'questions', true); ?>
  <thead >
    <tr>
      <?php for($i = 0; $i < $questions; $i++){  ?>
        <th><?=  $i . ': ' . get_post_meta($eventID, 'questions_'. $i .'_question', true); ?> ?</th>
      <?php  } ?>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php for($i = 0; $i < $questions; $i++){  ?>
        <td>
        <?php $answers = get_post_meta($eventID, 'questions_'. $i .'_question_ans', false); 
          shuffle($answers);
          foreach( $answers as $index => $value){
            $answer = explode('#', $value);
            echo '<div class="answer">' .$answer[0] . '<br> <small>- by ' . $answer[1] . '</small> </div>';
          }?>
        </td>
    <?php  } ?>
    </tr>
  </tbody>
</table>
</div>