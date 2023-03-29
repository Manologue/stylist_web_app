<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;


is_stylist(Session::action()->role);                                // Check if stylist


if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}


$booking = Booking::action()->get_by_id($identifier);

if (!$booking) {                                          // If category is empty
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}



$booking_completed = [
 'status' => 'completed',
];

$completed = Booking::action()->update($booking_completed, $identifier);

if ($completed) {
 $_SESSION['success'] = 'this booking has been completed';
} else {
 $_SESSION['failure'] = 'something went wrong';
}
redirect('account/bookings');
