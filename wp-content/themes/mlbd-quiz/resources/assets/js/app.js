// Theme by default loads a jQuery as dependency of the main script.
// Let's include it using ES6 modules import.
import $ from 'jquery'
import Cookie from './_cookie';
const cookie = new Cookie();

$(document).ready(function () {
  $("#welcome-form #submit").on("click", function (e) {
    e.preventDefault();
    var username = $("#welcome-form").find("#user_name").val();
    cookie.remove('username');
    cookie.create('username', username, 365);
    $(".welcome-popup-wrapper").remove();
  });
  $("#answer_form #submit").on("click", function (e) {
    e.preventDefault();
    var postId = $('article').data("post-id");
    var form = $("#answer_form");
    $(form).find(".form-group").each(function (index, value) {
      let metaID = $(value).data("id");
      $(value).find(".answer_wrapper").each(function (id, data) {
        var answer = $.trim($(data).find("textarea").val());
        var anynomus = ($(data).find("input[type='checkbox']").prop("checked")) ? 1 : 0;
        const dataVariables = {
          'action': 'update_question_answer',
          'meataID': metaID,
          'answer': answer,
          'anynomus': anynomus,
          'name': cookie.read('username'),
          'postID': postId,
        };
        // Captcha Test ajax call
        $.post(vars.ajaxurl, dataVariables).then(response => {
          if(response){
            window.location.href= vars.home_url + '/thank-you';
          }
        })
      });
    });
  });

  $("body").on("click", ".add_answer", function (e) {
    e.preventDefault();
    var thisEvent = this;
    addAnswer(thisEvent);
  });

  function addAnswer(thisEvent) {
    var answer = $(thisEvent).closest('.form-group').find(".answer_wrapper");
    var thisNumber = $(answer).data("no");
    $(thisEvent).closest('.form-group').find(".multiple-answer-area").append($(answer)[0].outerHTML);
  }
});