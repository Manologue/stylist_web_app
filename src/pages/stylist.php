<?php

declare(strict_types=1);                                 // Use strict types
// session_start();
// session_destroy();
// $_SESSION = [];
// die;
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// die;






use StylistCommerce\CMS\ServiceCreated;
use StylistCommerce\CMS\User;
use StylistCommerce\CMS\UserGallery;

$failure  = isset($_SESSION['failure']) ? $_SESSION['failure'] : null;

if (isset($_SESSION['failure'])) {
 unset($_SESSION['failure']);
}

if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}
$user = User::action()->get_by_url_address($identifier);

if (!$user) {                                          // If user is empty
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}

$id = $user['id'];   // user id

$gallery = UserGallery::action()->get_gallery($id);


$services = ServiceCreated::action()->get_all(true, $id);  // get all user services

// echo $user['role'];

if (!empty($services) || count($services) !== 0) {

 if ($user['role'] === 'suspended') {
  redirect("");
 }

 $starter_category_id = $services[0]['category_id'];  // first cat id, note that the query of services is order by category_id

 $categories = []; // initial categories array

 /* arrange each service with its category */
 foreach ($services as $service) {
  $category_title = $service['category'];   // get category title to store it as an array key name

  if ($service['category_id'] === $starter_category_id) {
   $categories[$category_title][] = $service;
  } else {
   $starter_category_id = $service['category_id'];
   $categories[$category_title][] = $service;
  }
 }
 $cart_page = "stylist";
} else {
 redirect("");
}

include APP_ROOT . '/templates/stylist.php';
