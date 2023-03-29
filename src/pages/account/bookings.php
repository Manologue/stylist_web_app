<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;





is_stylist(Session::action()->role);                                // Check if stylist


$bookings = Booking::action()->get_all(false, $_SESSION['id'], 'yes', false, true, true);


$success  = ($_SESSION['success']) ?? null;            // Check for success message
$failure  = ($_SESSION['failure']) ?? null;            // Check for failure message




if (isset($_SESSION['success'])) {
 unset($_SESSION['success']);
}
if (isset($_SESSION['failure'])) {
 unset($_SESSION['failure']);
}


// echo '<pre>';
// var_dump($bookings);
// echo '</pre>';

// die;

include APP_ROOT . '/templates/account/bookings.php';
