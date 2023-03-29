<?php


use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;
use StylistCommerce\Validate\Validate;

is_admin(Session::action()->role);                                // Check if admin

$failure  = $_GET['failure'] ?? null;            // Check for failure message
$success  = $_GET['success'] ?? null;            // Check for success message


$user = User::action()->get_by_id($_SESSION['id']);



$saved       = null;                                     // Did article save

$errors  = [
 'email'     => '',
 'name'       => '',
 'first_name'     => '',
 'adress'  => '',
 'warning'  => '',

];                                                       // Errors

$profile = [
 'email'     => $user['email'],
 'name'       => $user['name'],
 'first_name'     => $user['first_name'],
 'adress'  => $user['adress'],
];



if (isset($_POST['update'])) {              // If form submitted

 // Get article data
 $profile['email']       = $_POST['email'];
 $profile['name']     = $_POST['name'];
 $profile['first_name']     = $_POST['first_name'];
 $profile['adress']     = $_POST['adress'];



 // Check if all data was valid and create error messages if it is invalid
 $errors['email']    = Validate::isEmail($profile['email'])
  ? '' : 'Please enter a valid email';

 $errors['name']  = Validate::isText($profile['name'], 1, 254)
  ? '' : 'name should be 1 - 254 characters.';  // Validate description
 $errors['first_name']  = Validate::isText($profile['first_name'], 1, 254)
  ? '' : 'first name should be 1 - 254 characters.';  // Validate description

 $invalid = implode($errors);

 // Check if data is valid, if so update database
 if ($invalid) {                                                     // If invalid data
  $errors['warning'] = 'Please correct form errors';              // Store error
 } else {                                                            // Otherwise
  $arguments = $profile;                                          // Save data as $arguments

  $saved = User::action()->update($arguments, $_SESSION['id'], null, null); // Update article
  if ($saved == true) {                                            // If updated
   $success = "updated successfully";
  } else {                                                         // Otherwise
   $failure = 'Something went wrong you are using an email that is already used in the website';         // Store message
  }
 }
}


$user = User::action()->get_by_id($_SESSION['id']);



include APP_ROOT . '/templates/admin/profile.php';
