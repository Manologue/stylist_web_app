<?php

declare(strict_types=1);                                 // Use strict types



use StylistCommerce\CMS\ServiceProposal;
use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\ServiceCreated;
use StylistCommerce\Validate\Validate;
use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;
use StylistCommerce\CMS\UserCategory;

is_stylist(Session::action()->role);                                // Check if stylist


if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}



$service_proposal_id   = $parts[3] ?? null;


$category = Category::action()->get_by_id($identifier);

$check_user_category = UserCategory::action()->get_all(false, $category['id'], $_SESSION['id']); //


$user_category = [
 'category_id' => $identifier,
 'user_id' => $_SESSION['id'],
];
// echo '<pre>';
// var_dump($user_category);
// echo '</pre>';

// die;

$service = [
 'id' => null,
 'title' => '',
 'description' => '',
 'price' => '',
 'category_id' => $identifier,

];

$errors = [
 'title' => '',
 'description' => '',
 'price' => '',
 'warning' => '',
];

if (!$category) {                                          // If category is empty
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}

if ($service_proposal_id) {
 $service = ServiceProposal::action()->get_by_id($service_proposal_id);
 if (!$service) {
  include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
  die;
 }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {              // If form submitted

 $service['title'] = $_POST['title'];
 $service['description'] = $_POST['description'];
 $service['price'] = (int)$_POST['price'];
 $service['category_id'] = (int)$_POST['category_id'];
 $service['user_id'] = $_SESSION['id'];

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
  unset($arguments['id']); // Unset service proposal id

  $save = ServiceCreated::action()->create($arguments);        // Create service

  if ($save) {
   $_SESSION['success'] = 'saved successfully';
   if (!$check_user_category) {
    UserCategory::action()->create($user_category);
   }
   // die;
   redirect('account/services/'); // Redirect

  } else {
   $errors['warning'] = 'Something went wrong';         // Store message
  }
 }
}
include APP_ROOT . '/templates/account/service.php';
