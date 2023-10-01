<?php

// check if user coming from a request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // assign variables
  $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $phone = filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT);
  $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  $formError = array();

  if (strlen($user) <= 3) {
    $formError[] = 'The Username Must Be Larger Than <strong>3</strong> Characters !';
  }

  if (strlen($mail) < 1) {
    $formError[] = 'The Email Field Should Not Be Empty';
  }

  if (strlen($msg) < 10) {
    $formError[] = 'The Message Must Be Larger Than <strong>9</strong> Characters !';
  }

  // Send The Email => mail(to,subject,message,headers,parameters);
  $to = "adnanhaji127@gmail.com";
  $subject = "Contact Form";
  $header = "From:" . $mail . "\r\n";
  if (empty($formError)) {
    mail($to, $subject, $msg, $header);
    $user = "";
    $mail = "";
    $phone = "";
    $msg = "";
  $success = '<div class="success">We Have Recieved Your Message</div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/contact.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/all.min.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="css/normalize.css?v=<?php echo time(); ?>">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600;800&display=swap" rel="stylesheet">
  <title>Contact Form</title>
</head>

<body>
  <div class="container">
    <h1>Contact Us</h1>
    <?php if (isset($formError) && sizeof($formError) > 0) { ?>
      <div class="errors">
        <i class="fa fa-times fa-solid"></i>
        <?php
        foreach ($formError as $error) {
          echo $error . "<br>";
        }
        ?>
      </div>
    <?php } ?>
    <?php if (isset($success)) {
      echo $success;
    } ?>
    <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="input-container">
        <input type="text" name="username" placeholder="username" value="<?php if (isset($user)) {
          echo $user;
        } ?>">
        <i class="fa fa-user fa-solid fa-fw"></i>
        <span>*</span>
        <div class="wrong errors">The Username Must Be Larger Than <strong>3</strong> Characters</div>
      </div>
      <div class="input-container">
        <input type="email" name="email" placeholder="your email" value="<?php if (isset($mail)) {
          echo $mail;
        } ?>">
        <i class="fa fa-envelope fa-solid fa-fw"></i>
        <span>*</span>
        <div class="wrong errors">It Should Not Be Empty</div>
      </div>
      <div class="input-container">
        <input type="text" name="number" placeholder="your phone number" value="<?php if (isset($phone)) {
          echo $phone;
        } ?>">
        <i class="fa fa-phone fa-solid fa-fw"></i>
      </div>
      <div class="input-container">
        <textarea name="message" placeholder="Your Message!"><?php if (isset($msg)) {
          echo $msg;
        } ?></textarea>
        <i class="fa fa-message fa-solid fa-fw"></i>
        <span>*</span>
        <div class="wrong errors">The Message Must Be Larger Than <strong>9</strong> Characters</div>
      </div>
      <input type="submit" name="send" value="Send Message" disabled>
      <i class="fa fa-paper-plane fa-solid fa-fw"></i>
    </form>
  </div>
  <script src="js/jquery/jquery-3.7.0.min.js"></script>
  <script src="js/jquery/contact.js?v=<?php echo time(); ?>"></script>
</body>

</html>