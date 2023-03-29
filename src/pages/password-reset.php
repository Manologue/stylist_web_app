<?php

declare(strict_types=1);                                          // Use strict types
use StylistCommerce\Validate\Validate;
use StylistCommerce\CMS\Token;
use StylistCommerce\CMS\User;

$user = [];


$errors = [
 'password' => '',
 'confirm' => '',
 'message' => '',
];                                                       // Initialize array

$token = $_GET['token'] ?? '';                                      // Get token
if (!$token) {                                                      // If id not returned
 redirect('login/');                                             // Redirect
}

$id = Token::action()->getMemberId($token, 'password_reset');      // Get member id

if (!$id) {
 redirect('login/', ['warning' => 'Link expired, try again.']);  // Redirect
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form submitted

 $password = $_POST['password'];                             // Get new password
 $confirm  = $_POST['confirm'];                              // Get password confirm


 // Validate passwords and check they match
 $errors['password'] = Validate::isPassword($password)
  ? '' : 'Passwords must be at least 5 characters and have:<br> ';                   // Invalid password
 $errors['confirm']  = ($password === $confirm)
  ? '' : 'Passwords do not match';                        // Password does not match

 $invalid = implode($errors);                                // Join error messages
 if ($invalid) {                                             // If password not valid
  $errors['message'] = 'Please enter a valid password.';  // Store error message
 } else {                                                    // Otherwise
  $user['password'] = password_hash($password, PASSWORD_DEFAULT);  // Hash password
  $update_password = User::action()->update($user, $id, null, null);  // Update password
  if ($update_password) {
   $user = User::action()->get_by_id($id);                // Get user details
   $subject = 'Password updated';                          // Create subject and body
   $body    = 'Your password was updated on ' . date('Y-m-d H:i:s') .
    ' if you did not reset the password email ' . $email_config['admin_email'];
   $email   = new \StylistCommerce\Email\Email($email_config);     // Create email object
   // Send email
   $email->sendEmail($email_config['admin_email'], $user['email'], $subject, $body);
   redirect('login/', ['success' => 'Password updated']);  // Redirect to login
  } else {
   redirect('login/', ['warning' => 'Password update failed.']);  // Redirect to login
  }
 }
}



include APP_ROOT . '/templates/password-reset.php';
