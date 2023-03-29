<?php

declare(strict_types=1);                               // Use strict types
use StylistCommerce\Validate\Validate;    // Import Validate class
use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;



if (Session::action()->role == 'admin') {             // If user is already logged in
 redirect('admin/index');        // Redirect to their page
 exit;                                                // Stop code running
}
if (Session::action()->role !== 'admin' && Session::action()->role !== 'public') {             // If user is already logged in
 redirect('account/index');        // Redirect to their page
 exit;                                                // Stop code running
}


$email   = '';                                           // Initialize email variable
$errors  = [
 'email' => '',
 'password' => '',
 'message' => ''
];                                           // Initialize errors
$success = $_GET['success'] ?? null;                     // Get success message
$warning = $_GET['warning'] ?? null;                     // Get success message


if ($_SERVER['REQUEST_METHOD'] == 'POST') {              // If form submitted
 $email    = $_POST['email'];                         // Get email address
 $password = $_POST['password'];                      // Get password

 $errors['email']    = Validate::isEmail($email)
  ? '' : 'Please enter a valid email address';           // Validate email
 $errors['password'] = Validate::isPassword($password)
  ? '' : 'Passwords must be at least 5 characters';                  // Validate password
 $invalid = implode($errors);                               // Join errors

 if ($invalid) {                                            // If data is not valid
  $errors['message'] = 'Please try again.';              // Store error message
 } else {                                                   // If data was valid
  $user = User::action()->login($email, $password); // Get member details
  if ($user and $user['role'] == 'suspended') {      // If member is suspended
   $errors['message'] = 'Account suspended';          // Store message
  } elseif ($user) {                                   // Otherwise for members
   Session::action()->create($user);               // Create session
   if ($user['role'] !== 'admin') {
    redirect('account/index/');               // Redirect to their page
   } else {
    redirect('admin/index');
   }
  } else {                                               // Otherwise
   $errors['message'] = 'Please try again.';          // Store error message
  }
 }
}


include APP_ROOT . '/templates/login.php';
