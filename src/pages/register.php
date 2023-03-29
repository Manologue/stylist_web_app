<?php

declare(strict_types=1);                               // Use strict types
use StylistCommerce\CMS\Database;
use StylistCommerce\CMS\Notification;
use StylistCommerce\Validate\Validate;
use StylistCommerce\CMS\User; // Import Validate class

$user = [                                                 // Initialize user array
 'name' => '',
 'first_name'       => '',
 'adress'     => '',
 'zip_code'     => '',
 'tel'     => '',
 'email'     => '',
 'password'     => '',
 'url_address'     => ''

];
$errors = [                             // Initialize errors array
 'name' => '',
 'first_name'       => '',
 'adress'     => '',
 'zip_code'     => '',
 'tel'     => '',
 'email'     => '',
 'password'     => '',
 'confirm_password'     => '',
 'terms' => '',
 'warning' => '',
];
$notification = [
 'subject' => 'new user',

];
$terms = 0;

if (isset($_POST['register'])) {
 $user['name'] = $_POST['name'];
 $user['first_name'] = $_POST['first_name'];
 $user['adress'] = $_POST['adress'];
 $user['zip_code'] = $_POST['zip_code'];
 $user['tel'] = $_POST['tel'];
 $user['email'] = $_POST['email'];
 $user['password'] = $_POST['password'];
 $confirm = $_POST['confirm_password'];
 $terms = isset($_POST['terms']) ? 1 : 0;


 // Validate form data
 $errors['name'] = Validate::isText($user['name'], 1, 254)
  ? '' : 'name must be 1-254 characters';
 $errors['first_name']  = Validate::isText($user['first_name'], 1, 254)
  ? '' : 'first name must be 1-254 characters';
 $errors['adress']  = Validate::isText($user['adress'], 1, 254)
  ? '' : 'adress must be 1-254 characters';
 $errors['tel']  = Validate::isText($user['tel'], 1, 20)
  ? '' : 'adress must be 1-20 characters';
 $errors['email']    = Validate::isEmail($user['email'])
  ? '' : 'Please enter a valid email';
 $errors['password'] = Validate::isPassword($user['password'])
  ? '' : 'Passwords must be at least 5 characters';
 $errors['confirm_password']  = ($user['password'] = $confirm)
  ? '' : 'Passwords do not match';


 if ($terms === 0) {
  $errors['terms']    = 'You must agree to the terms of service';
 }


 $invalid = implode($errors);

 if ($invalid !== '') {
  $errors['warning'] = 'Please correct form errors';
 } else {
  $user['url_address'] = $user['first_name'] . '-' . mb_substr($user['name'], 0, 1) . '-' . generateRandomString();
  $result = User::action()->create($user);        // Create user + store result
  if ($result === false) {                             // If result is false
   $errors['email'] = 'Email address already used'; // Store a warning
   $errors['warning'] = 'Please correct form error';
  } else {                                             // Otherwise send to login
   $_SESSION = [];
   // get the last user record from db
   $user_id = Database::table('user')::connection()->lastInsertId();

   $last_user = User::action()->get_by_id($user_id);

   $notification['body'] = 'user with id ' . $last_user['url_address']; // Display

   $admin = User::action()->get_by_role('admin');
   $notification['user_id'] = $admin['id'];

   $add_notif = Notification::action()->create($notification);

   redirect('login/', ['success' => 'Thanks for joining! Please log in.']);
  }
 }
}





include APP_ROOT . '/templates/register.php';
