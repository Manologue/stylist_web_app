<?php

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\ServiceCreated;
use StylistCommerce\CMS\ServiceProposal;
use StylistCommerce\CMS\Session;
use StylistCommerce\Validate\Validate;




is_stylist(Session::action()->role);                                // Check if stylist





if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}


$service = ServiceCreated::action()->get_by_id($identifier);
$category = Category::action()->get_by_id($service['category_id']);

// echo '<pre>';
// var_dump($service);
// echo '</pre>';

// echo '<pre>';
// var_dump($category);
// echo '</pre>';
// die;

$errors = [
 'title' => '',
 'description' => '',
 'price' => '',
 'warning' => '',
];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {              // If form submitted

 $service['title'] = $_POST['title'];
 $service['description'] = $_POST['description'];
 $service['price'] = (int)$_POST['price'];

 // Check if all data was valid and create error messages if it is invalid
 $errors['title']    = Validate::isText($service['title'], 1, 80)
  ? '' : 'Title should be 1 - 80 characters.';     // Validate title
 $errors['description']  = Validate::isText($service['description'], 1, 254)
  ? '' : 'Description should be 1 - 254 characters.';  // Validate description


 $invalid = implode($errors);

 if ($invalid) {                                                     // If invalid data
  $errors['warning'] = 'Please correct form errors';              // Store error
 } else {                                                            // Otherwise
  $arguments = $service;                                          // Save data as $arguments

  // echo '<pre>';
  // var_dump($arguments);
  // echo '</pre>';
  // die;
  unset($arguments['id'], $arguments['category_id'], $arguments['user_id']); // Unset service proposal id

  $save = ServiceCreated::action()->update($arguments, $service['id']);        // Create service

  if ($save) {
   $_SESSION['success'] = $arguments['title'] . ' updated successfully';
   redirect('account/services/'); // Redirect

  } else {
   $errors['warning'] = 'Something went wrong';         // Store message
  }
 }
}





include APP_ROOT . '/templates/account/edit_service.php';
