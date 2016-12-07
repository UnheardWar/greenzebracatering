<?php

session_start();

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];
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
    <div class="forms-wrap">
        <?php if(!empty($errors)): ?>
            <div class="forms">
                <ul><li><?php echo implode('</li><li>', $errors); ?></li></ul>
            </div>
        <?php endif; ?>

        <div class="forms">
            <form action="contact.php" method="post">
        </div>
        <div class="forms">
            <label>
                Your Name *
                <input type="text" name="name" autocomplete="off" <?php echo isset($fields['name']) ? 'value="' . $fields['name'] . '"' : '' ?>>
            </label>
        </div>
        <div class="forms">
            <label>
                Your email address *
                <input type="text" name="email" autocomplete="off" <?php echo isset($fields['email']) ? 'value="' . $fields['email'] . '"' : '' ?>>
            </label>
        </div>
        <div class="forms">
            <label>
                Your Message *
                <textarea name="message" rows="18"></textarea>
            </label>
        </div>
        <div class="forms">
            <input type="submit" value="Send">
            <p>* Required field</p>
        </div>
    </div>
</body>
</html>

<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>