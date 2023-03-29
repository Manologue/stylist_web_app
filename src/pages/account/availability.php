<?php


use StylistCommerce\CMS\Day;
use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\UserDay;






is_stylist(Session::action()->role);                                // Check if stylist

$success  = ($_SESSION['success']) ?? null;            // Check for success message
$failure  = ($_SESSION['failure']) ?? null;            // Check for failure message



if (isset($_SESSION['success'])) {
 unset($_SESSION['success']);
}
if (isset($_SESSION['failure'])) {
 unset($_SESSION['failure']);
}

$days = Day::action()->get_all();

foreach ($days as $day) {
 $times[] = UserDay::action()->get_date_time($_SESSION['id'], $day['id'], true, false);
}



include APP_ROOT . '/templates/account/availability.php';
