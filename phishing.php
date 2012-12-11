<?php

$to = 'mridulv09@gmail.com';
$subject = 'password hacked';
$message = "abssbsckd";
$headers = 'from:webmaster@example.com' . "\r\n" .
       'Reply-To:webmaster@example.com' . "\r\n" .
       'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
?>
