<?php



declare(strict_types=1);                                 // Use strict types

use StylistCommerce\CMS\User;
use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Database;
use StylistCommerce\CMS\Notification;
use StylistCommerce\Validate\Validate;
use StylistCommerce\CMS\ServiceCreated;




if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}

if (isset($_SESSION['role'])) {
 if ($_SESSION['role'] == 'stylist') {
  $_SESSION['failure'] = 'Sorry you cannot access this page and take a rendez vous if you are still logged in as a stylist';
  redirect('stylist/' . $identifier);
 }
}


$user = User::action()->get_by_url_address($identifier);

if (!$user) {                                          // If user is empty
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}
$id = $user['id'];   // user id

// echo '<pre>';
// var_dump($_SESSION["user_$id"]);
// echo '</pre>';
// die;


if (isset($_POST['valid'])) {                         // check that it was validated by cart form before continuing
 $_SESSION["valid_cart_user_{$user['id']}"] = true;
}


$is_valid_location = $_SESSION["chosenLocation_{$user['id']}"] ?? "invalid";  // check if cart location is valid

$is_valid_datetime = $_SESSION["valid_date_time_{$user['id']}"] ?? "invalid"; // check if date has been validated and if date is present in the session



if (!isset($_SESSION["valid_cart_user_{$user['id']}"]) ||  $is_valid_location !== 'valid' || $is_valid_datetime == "invalid") { // if never validated or session expired redirect back to user stylist page 
 header('Location: ' . DOC_ROOT . 'stylist/' . $identifier . '/cart' . '/select-datetime');
 die;
}

$date = new \DateTime($is_valid_datetime);


$format_date = $date->format('l, jS M Y');
$format_time = $date->format('H:i');



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
 $cart_page = "authenticate";
} else {
 echo "<h1>you have no services to offer bro !!!!</h1>";
 die;
}

// $temp        = $_FILES['image']['tmp_name'] ?? '';       // Temporary image
// $destination = '';                                     // Where to save file
$saved_booking       = null;                                     // Did booking save


// Initialize variables needed for the HTML page

$booking = [
 'user_id' => $user['id'],
 'name'       => '',
 'adress'     => '',
 'zip_code'     => '',
 'tel'   => '',
 'email' => '',
 'description'    => '',
 'date_time'    =>  $_SESSION["valid_date_time_{$user['id']}"],
 'location' => $user['city_of_work'],
 'amount' => $_SESSION["total_service_amount_{$user['id']}"]

];
$terms = 0;

$errors  = [
 'warning' => '',
 'name'     => '',
 'adress'       => '',
 'zip_code'     => '',
 'tel'     => '',
 'email'      => '',
 'description'    => '',
 'terms'    => ''
];

$notification = [
 'subject' => 'new booking',
];

if (isset($_POST['add_booking'])) {  // on submit form
 // get booking data 
 $booking['name'] = $_POST['name'];
 $booking['adress'] = $_POST['adress'];
 $booking['zip_code'] = $_POST['zip_code'];
 $booking['tel'] = $_POST['tel'];
 $booking['email'] = $_POST['email'];
 $booking['description'] = $_POST['description'];
 // $booking['terms'] = $_POST['terms'];
 $terms = isset($_POST['terms']) ? 1 : 0;

 // echo '<pre>';
 // var_dump($_POST);
 // echo '</pre>';
 // echo $booking['terms'];
 // die;

 // Validate article data and create error messages if it is invalid
 $errors['email']    = Validate::isEmail($booking['email'])
  ? '' : 'Please enter a valid email address';           // Validate email

 $errors['name']    = Validate::isText($booking['name'], 1, 80)
  ? '' : 'name should be 1 - 80 characters.';     // Validate name

 $errors['tel']  = Validate::isText($booking['tel'], 1, 20)
  ? '' : 'adress must be 1-20 characters';

 $errors['adress']    = Validate::isText($booking['adress'], 1, 200)
  ? '' : 'adress should be 1 - 80 characters.';     // Validate tel

 $errors['zip_code']    = Validate::isText($booking['zip_code'], 0, 40)
  ? '' : 'zip_code should not exceed 40 characters.';     // Validate postal

 if ($terms === 0) {
  $errors['terms']    = 'You must agree to the terms of service';
 }

 $invalid_post = implode($errors);

 if ($invalid_post !== '') {
  $errors['warning'] = 'Please correct form errors';
 } else {
  // insert booking data into the database
  $arguments = $booking;

  $saved_booking = Booking::action()->create($arguments);

  // echo $saved;
  if ($saved_booking) {

   $last_id = Database::table('booking')::connection()->lastInsertId();

   $arguments_report = $_SESSION["user_{$user['id']}"];

   foreach ($arguments_report as $argument) {
    unset($argument['user_id']);
    $argument['booking_id'] = $last_id;
    $saved_report = Booking::action()->create_report($argument);
    if ($saved_report === false) {
     $errors['warning'] = 'Something went wrong. Please try again later';
    }
   }
   if ($errors['warning'] == '') {
    $_SESSION['success_booking'] = 'Your booking has been added successfully';



    $user_in_notif = User::action()->get_by_id($user['id']);

    $notification['body'] = 'new booking for user ' . $user_in_notif['url_address']; // Display

    $admin = User::action()->get_by_role('admin');
    $notification['user_id'] = $admin['id'];

    $add_notif = Notification::action()->create($notification);

    header('Location: ' . DOC_ROOT . 'stylist/' . $user['url_address'] . '/cart/success');
   }
  } else {
   $errors['warning'] = 'Something went wrong. Please try again later';
  }

  // echo '<pre>';
  // var_dump($arguments);
  // echo '</pre>';
 }
}


// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';



include APP_ROOT . '/templates/authenticate.php';
