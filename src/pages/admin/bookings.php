<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin



$success  = ($_SESSION['success']) ?? null;            // Check for success message
$failure  = ($_SESSION['failure']) ?? null;            // Check for failure message

if (isset($_SESSION['success'])) {
 unset($_SESSION['success']);
}
if (isset($_SESSION['failure'])) {
 unset($_SESSION['failure']);
}

$bookings = Booking::action()->get_all(false, null, 'no', true, false, false);



// echo '<pre>';
// var_dump($bookings);
// echo '</pre>';





include APP_ROOT . '/templates/admin/bookings.php';
