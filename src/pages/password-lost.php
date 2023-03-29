<?php


use StylistCommerce\CMS\Token;
use StylistCommerce\CMS\User;
use StylistCommerce\Validate\Validate;




$error = false;                                             // Error message
$sent  = false;                                             // Has email been sent


if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form submitted

 $email = $_POST['email'];                                 // Get email
 $error = Validate::isEmail($email) ? '' : 'Please enter your email'; // Validate
 if ($error === '') {                                    // If email valid
  $user = User::action()->get_by_email($email);


  if (isset($user['id'])) {                                          // If id found
   $token   = Token::action()->create($user['id'], 'password_reset');     // Token
   $link  = DOMAIN . DOC_ROOT . 'password-reset/?token=' . $token; // Link
   $link = str_replace("\\", "/", $link);
   $subject = 'Reset Password Link';               // Email subject
   $body    = 'To reset password click: <a href="' . $link . '">' . $link . '</a>'; // Email body
   $mail    = new \StylistCommerce\Email\Email($email_config);   // Email object
   $sent = $mail->sendEmail($email_config['admin_email'], $email, $subject, $body);         // Send
  } else {
   $error = 'Email not found';
  }                                                                                // Send to login
 }
}






include APP_ROOT . '/templates/password-lost.php';
