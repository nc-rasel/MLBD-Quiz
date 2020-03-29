<?php

namespace Tonik\Theme\App\Http;

/*
|-----------------------------------------------------------
| Theme AJAX Actions
|-----------------------------------------------------------
|
| This file is for registering your theme AJAX actions,
| which can be hit with HTTP requests in order to make
| smooth and dynamic JavaScript components.
|
*/

/**
 * Update Questions Answer
 *
 */

function update_question_answer(){
    $postID = $_POST['postID'];
    $meataID = $_POST['meataID'];
    $answer = $_POST['answer'];
    $anynomus = $_POST['anynomus'];
    $name = $_POST['name'];
    $username = ((int)$_POST['anynomus']) ? 'anynomus' : $name;
    $result = add_post_meta($postID, $meataID . '_ans', $answer . '#' . $username , false );
    
    wp_send_json($result);
  }
 add_action('wp_ajax_update_question_answer', 'Tonik\Theme\App\Http\update_question_answer');
 add_action('wp_ajax_nopriv_update_question_answer', 'Tonik\Theme\App\Http\update_question_answer');
