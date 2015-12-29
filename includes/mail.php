<?php

// Define constants
define("RECIPIENT_NAME", "Your Name");
define("RECIPIENT_EMAIL", "youremail@domain.com");
define("EMAIL_SUBJECT", "Visitor Message");

// Read form values
$send = false;
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Check availability of values, then send mail
if ($name && $email && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $name . " <" . $email . ">";
  $send = mail($recipient, EMAIL_SUBJECT, $message, $headers);
}

// Give responses to browser
if (isset($_GET["ajax"])) {
  echo $send ? "success" : "error";
} 

else {

// If js disabled, this will be shown
?>
<html>
  <head>
    <title>Message</title>
  </head>
  <body>
    <?php if ($send) echo "<p>Message has been successfully sent.</p>" ?>
    <?php if (!$send) echo "<p>There was an error in sending message. Please try again.</p>" ?>
    <p>Click your browser's Back button to return to the page.</p>
  </body>
</html>
<?php
}
?>

