$(document).ready(function () {

  // remove the error message
  $(".container .errors i").on("click", function () {
    $(this).parent().fadeOut();
  });

  // Show error message when writting
  let username_error = true;
  let email_error = true;
  let msg_error = true;

  $('.container .contact-form input[name="username"]').on("keyup", function () {
    if ($(this).val().length < 4) {
      $(this).css("border", '1px solid rgb(255 119 119)');
      $($(this).parent().find('.wrong')).fadeIn();
      $($(this).parent().find('span')).fadeIn();
      username_error = true;
    } else {
      $(this).css("border", '1px solid rgb(5 196 107)');
      $($(this).parent().find('.wrong')).fadeOut();
      $($(this).parent().find('span')).fadeOut();
      username_error = false;
    }
  });

  $('.container .contact-form input[name="email"]').on("keyup", function () {
    if ($(this).val().length < 1) {
      $(this).css("border", '1px solid rgb(255 119 119)');
      $($(this).parent().find('.wrong')).fadeIn();
      $($(this).parent().find('span')).fadeIn();
      email_error = true;
    } else {
      $(this).css("border", '1px solid rgb(5 196 107)');
      $($(this).parent().find('.wrong')).fadeOut();
      $($(this).parent().find('span')).fadeOut();
      email_error = false;
    }
  });

  $('.container .contact-form textarea').on("keyup", function () {
    if ($(this).val().length < 10) {
      $(this).css("border", '1px solid rgb(255 119 119)');
      $($(this).parent().find('.wrong')).fadeIn();
      $($(this).parent().find('span')).fadeIn();
      msg_error = true;
    } else {
      $(this).css("border", '1px solid rgb(5 196 107)');
      $($(this).parent().find('.wrong')).fadeOut();
      $($(this).parent().find('span')).fadeOut();
      msg_error = false;
    }
  });

  // enable and disable the send button

  $('.container .contact-form input, textarea').on("keyup", function () {
    if (username_error == false && email_error == false && msg_error == false) {
      $('.container .contact-form input[type="submit"]').removeAttr("disabled");
    } else {
      $('.container .contact-form input[type="submit"]').attr("disabled", true);
    }
  })
});