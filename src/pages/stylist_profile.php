<?php

declare(strict_types=1);                                 // Use strict types


use StylistCommerce\CMS\ServiceCreated;
use StylistCommerce\CMS\User;
use StylistCommerce\CMS\UserGallery;

if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}
$user = User::action()->get_by_url_address($identifier);

if (!$user) {                                          // If user is empty
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}

// echo $_SESSION['role'];
// die;

if (!isset($_SESSION['role'])) {
 redirect('');
}
if ($_SESSION['role'] !== 'admin' && strtolower($_SESSION['url_address']) !== strtolower($identifier)) {
 redirect('');
}



$id = $user['id'];   // user id

$gallery = UserGallery::action()->get_gallery($id);


$services = ServiceCreated::action()->get_all(false, $id);  // get all user services

// echo $user['role'];

if (!empty($services) || count($services) !== 0) {


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
 $cart_page = "stylist_profile";
}

include APP_ROOT . '/templates/stylist_profile.php';
