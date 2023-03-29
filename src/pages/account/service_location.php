<?php

use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;


is_stylist(Session::action()->role);                                // Check if stylist

$success = '';
$failure = '';


$save = null;
$user = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form submitted

 $user['city_of_work'] = $_POST['city_of_work'];
 $user['city'] = $_POST['city'];
 $user['state'] = $_POST['state'];

 $save = User::action()->update($user, $_SESSION['id'], null, null);

 if ($save) {
  $success = 'updated successfully';
 } else {
  $failure = 'update failed';
 }
}


$user_info = User::action()->get_by_id($_SESSION['id']);

$city_of_work = $user_info['city_of_work'];






include APP_ROOT . '/templates/account/service_location.php';
