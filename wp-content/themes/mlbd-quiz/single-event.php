<?php get_header(); ?>
<?php 
  if(have_posts()):
    while(have_posts()): the_post(); 

?>
<div class="single-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

      <article class="article-<?= get_the_ID();?>" data-post-id="<?= get_the_ID(); ?>">
      <h2 class="header_title h2"><?= get_the_title(); ?></h3>
      <?php the_content(); ?>
      <?php $questions = (int)get_post_meta(get_the_ID(), 'questions', true);?>
      <section class="answers">
        
        <form action="" method="POST" id="answer_form">
          <?php for($i = 0; $i < $questions; $i++){  ?>
              <div class="form-group " data-id="questions_<?= $i; ?>_question">
                <h4 class="h4"><label for="questions_<?= $i; ?>_question_ans"><?= get_post_meta(get_the_ID(), 'questions_'. $i .'_question', true); ?></label></h4>
                <div class="multiple-answer-area">
                  <div class="questions_<?= $i; ?>_question_ans_wap answer_wrapper">
                    <textarea name="ans" cols="30" rows="10" class="form-control"></textarea>
                    <input type="checkbox" class="form-check-input" id="anynomus" name="anynomus" value="Show answer as anynomus">
                    <label class="form-check-label">I would like to answer this anonymously</label>
                  </div>
                </div>
                <button class="add_answer btn btn-info mb-2">Add Answer</button><br /><br /><br />
              </div>
          <?php  } ?>
          <input type="submit" class="btn btn-success p-2 submit-button" name="submit" id="submit" value="submit">
        </form>

      </section>
      </article>

      </div>
    </div>
  </div>
</div>
<?php 
  endwhile;
endif;

?>
<?php get_footer(); ?>