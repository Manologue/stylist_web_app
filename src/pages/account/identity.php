<?php

use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;
use StylistCommerce\Validate\Validate;




is_stylist(Session::action()->role);                                // Check if stylist




$success = "";
$failure = "";


$errors  = [
 'email'     => '',
 'name'       => '',
 'first_name'     => '',
 'adress'  => '',
 'tel'  => '',
 'zip_code'  => '',
 'warning'  => '',
];                                                       // Errors
$user = User::action()->get_by_id($_SESSION['id']);


$identity = [
 'email'     => $user['email'],
 'name'       => $user['name'],
 'first_name'     => $user['first_name'],
 'adress'  => $user['adress'],
 'tel'  => $user['tel'],
 'zip_code'  => $user['zip_code'],
];



if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form submitted

 // Get article data
 $identity['email']       = $_POST['email'];
 $identity['name']     = $_POST['name'];
 $identity['first_name']     = $_POST['first_name'];
 $identity['adress']     = $_POST['adress'];
 $identity['tel']     = $_POST['tel'];
 $identity['zip_code']     = $_POST['zip_code'];

 $errors['email']    = Validate::isEmail($identity['email'])
  ? '' : 'Please enter a valid email';

 $errors['name']  = Validate::isText($identity['name'], 1, 254)
  ? '' : 'name should be 1 - 254 characters.';  // Validate 
 $errors['first_name']  = Validate::isText($identity['first_name'], 1, 254)
  ? '' : 'first name should be 1 - 254 characters.';  // Validate

 $invalid = implode($errors);

 if ($invalid !== '') {
  $errors['warning'] = 'Please correct form errors';
 } else {
  $arguments = $identity;                                          // Save data as $arguments

  $saved = User::action()->update($arguments, $_SESSION['id'], null, null); // Update article

  if ($saved == true) {                                            // If updated
   $success = "updated successfully";
   $_SESSION['first_name'] = $identity['first_name'];
  } else {                                                         // Otherwise
   $failure = 'Something went wrong you are using an email that is already used in the website';         // Store message
  }
 }
}



include APP_ROOT . '/templates/account/identity.php';
