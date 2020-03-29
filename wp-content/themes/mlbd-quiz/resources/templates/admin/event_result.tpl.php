<div class="wrap">
<h1 class="wp-heading-inline">Event results</h1>
<a href="<?= admin_url('/admin.php?page=events%2Fresult.php' ); ?>" class="page-title-action">Back</a>
<hr class="wp-header-end">


<?php $eventID = $_GET['post_id']; ?>
<h3 class="event-name"><?= get_the_title($eventID); ?></h3>
<?php $questions = (int)get_post_meta($eventID, 'questions', true); ?>
  
  



<div class="answar-wrapper">
<?php for($i = 0; $i < $questions; $i++){  ?>
  <div>
    
    <span class="question"><?=  ($i + 1) . ': ' . get_post_meta($eventID, 'questions_'. $i .'_question', true); ?></span>
    <ul>
      <li>
      <?php $answers = get_post_meta($eventID, 'questions_'. $i .'_question_ans', false); 
        shuffle($answers);
        foreach( $answers as $index => $value){
          $answer = explode('#', $value);
          echo '<div class="answer">' .$answer[0] . '<br> <small>- by ' . $answer[1] . '</small> </div>';
        }?>
      </li>
    </ul>
    
  </div>
  <?php  } ?>
</div>
</div>