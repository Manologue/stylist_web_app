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

$booking_cancelled = [
 'status' => 'cancelled',
];

$cancelled = Booking::action()->update($booking_cancelled, $identifier);

if ($cancelled) {
 $_SESSION['success'] = 'this booking has been cancelled';
} else {
 $_SESSION['failure'] = 'something went wrong';
}
redirect('account/bookings');
