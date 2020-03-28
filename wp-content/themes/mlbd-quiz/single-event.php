<?php get_header(); ?>
<?php 
  if(have_posts()):
    while(have_posts()): the_post(); 

?>
<article class="article-<?= get_the_ID();?>" data-post-id="<?= get_the_ID(); ?>">
<h3 class="header_title"><?= get_the_title(); ?></h3>
<?php the_content(); ?>
<?php 
$questions = (int)get_post_meta(get_the_ID(), 'questions', true);
?>
<section class="answers">
  <form action="" method="POST" id="answer_form">
    <?php
      for($i = 0; $i < $questions; $i++){
        ?>
        <div class="form-group " data-id="questions_<?= $i; ?>_question">
          <label for="questions_<?= $i; ?>_question_ans"><?= get_post_meta(get_the_ID(), 'questions_'. $i .'_question', true); ?></label>
          <div class="multiple-answer-area">
            <div class="questions_<?= $i; ?>_question_ans_wap answer_wrapper">
              <textarea name="ans" cols="30" rows="10"></textarea>
              <input type="checkbox" id="anynomus" name="anynomus" value="Show answer as anynomus">
            </div>
          </div>
          <button class="add_answer">Add Answer</button>
        </div>
        <?php
      }

    ?>
    <input type="submit" name="submit" id="submit" value="submit">
  </form>

</section>
</article>
<?php 
  endwhile;
endif;

?>
<?php get_footer(); ?>