<?php

if (empty($_POST) === false) {
    $errors = array();
    
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $message    = $_POST['message'];
    
    if (empty($name) === true || empty($email) === true || empty($message) === true) {
      $errors[] = 'Name, Email, and Message are required!';
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
          $errors[] = 'That\'s not a valid email address';
        if (ctype_alpha($name) === false) {
           $errors[] = 'Name must only contain letters!';
        }
}


    if (empty($errors) === true) {
      
      mail('', 'Contact form', $message, 'From: ' . $email);
      header('Location: index.php?sent');
      exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="GZC">

    <title>Green Zebra Catering Company</title>

    <!-- Custom CSS -->
    <link href="./css/testing.css" rel="stylesheet">
    <!-- Javascript -->
    
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans|Patrick+Hand" rel="stylesheet">
    
  </head>

<body>
  <article>
    
       <?php
       if (isset($_GET['sent']) === true) {
         echo '<p>Thanks for contacting us!</p>';
         } else {
       
        if(empty($errors) === false)  {
            echo '<ul>';
            foreach($errors as $error) {
              echo '<li>', $error, '</li>';
              
            }
            echo '</ul>';
        }
      ?>
      
    <div class="content-wrap">
      <form action="" method="post">
        <p>
          <label for="name">Name</label><br>
          <input type="text" name="name" id="name" <?php if (isset($_POST['name']) === true) { echo 'value="', strip_tags ($_POST['name']), '"'; }  ?>>
        </p>
        <p>
          <label for="email">Email:</label><br>
          <input type="text" name="email" id="email" <?php if (isset($_POST['email']) === true) { echo 'value="', strip_tags ($_POST['email']), '"'; }  ?>>
        </p>
        <p>
          <label for="message">Message:</label><br>
          <textarea name="message" id="message"><?php if (isset($_POST['message']) === true) { echo strip_tags ($_POST['message']), ''; }  ?></textarea>
        </p>
          <p>
            <input type="submit" value="Submit">
          </p>
      </form>
      
      <?php
      }
      ?>
    </div>
  </article>
</body>
</html>
    