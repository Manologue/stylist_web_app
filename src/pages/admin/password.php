<?php


use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;
use StylistCommerce\Validate\Validate;

is_admin(Session::action()->role);                                // Check if admin


$failure = '';
$success = '';


$errors = [
 "password" => "",
 "confirm_password" => "",
 "warning" => "",
];

$user = [
 "password" => "",
];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {              // If form submitted

 $user['password'] = $_POST['password'];
 $confirm = $_POST['confirm_password'];


 $errors['password'] = Validate::isPassword($user['password'])
  ? '' : 'Passwords must be at least 5 characters';
 $errors['confirm_password']  = ($user['password'] == $confirm)
  ? '' : 'Passwords do not match';

 $invalid = implode($errors);

 if ($invalid !== '') {
  $errors['warning'] = 'Please correct form errors';
 } else {
  $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);  // Hash password
  $result = User::action()->update($user, $_SESSION['id'], null, null);        // Create user + store result
  if ($result === false) {                             // If result is false
   $errors['warning'] = 'Something went wrong';
  } else {                                             // Otherwise send to login
   $success = 'updated successfully';
  }
 }
}



include APP_ROOT . '/templates/admin/password.php';
