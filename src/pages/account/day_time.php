<?php


use StylistCommerce\CMS\Day;
use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\UserDay;


is_stylist(Session::action()->role);                                // Check if stylist



if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}

$save = null;

$day = Day::action()->get_by_id($identifier);

if (!$day) {
 redirect('account/availability');
}


$check_user_day = UserDay::action()->get_date_time($_SESSION['id'], $day['id'], true, false);

if ($check_user_day) {
 redirect('account/availability');   // already created for this day
}


$user_day = [
 'user_id' => $_SESSION['id'],
 'day_id' => $day['id'],
 'time' => ''
];

$errors = [
 'time' => '',
 'warning' => ''
];


if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form submitted

 $time = $_POST['time'];

 if (($pos = strpos($time, "-")) !== FALSE) {
  $arr = explode("-", $time, 2);
  $range1 = $arr[0];

  $range2 = substr($time, strpos($time, "-") + 1);


  $myTime = '19:30';
  if (date('H:i', strtotime($range1)) > date('H:i', strtotime($range2))) {
   $time = $range2 . '-' . $range1;
  } else {
   $time = $range1 . '-' . $range2;
  }
 }

 $user_day['time'] = $time;


 $save = UserDay::action()->create($user_day);

 if ($save) {
  $_SESSION['success'] = 'saved successfully';
 } else {
  $_SESSION['failure'] = 'something went wrong';
 }

 redirect('account/availability');
}




include APP_ROOT . '/templates/account/day_time.php';
