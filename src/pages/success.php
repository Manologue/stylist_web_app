<?php

declare(strict_types=1);                                 // Use strict types


use StylistCommerce\CMS\ServiceCreated;
use StylistCommerce\CMS\User;
use StylistCommerce\CMS\UserDay;



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


// $user_days = User::action()->get_date_time($id);

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

// die;





if (!isset($_SESSION['success_booking'])) { // if not successful booking
 header('Location: ' . DOC_ROOT);
 die;
}

if (isset($_SESSION["valid_date_time_{$user['id']}"])) { // if date has already been validated

 $is_valid_datetime = $_SESSION["valid_date_time_{$user['id']}"];

 $date = new \DateTime($is_valid_datetime);

 $format_date = $date->format('l, jS M Y');
 $format_time = $date->format('H:i');
}

//check if stylist has already made his scheduled date

$user_day_time = UserDay::action()->get_date_time($user['id']);

// echo '<pre>';
// var_dump($user_day_time);
// echo '</pre>';

// die;




$services = ServiceCreated::action()->get_all(true, $id);  // get all user services


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
 $cart_page = "success";
} else {
 echo "<h1>you have no services to offer bro !!!!</h1>";
 die;
}



include APP_ROOT . '/templates/success.php';
