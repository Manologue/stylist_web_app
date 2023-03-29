<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;


is_stylist(Session::action()->role);                                // Check if stylist


if (!$identifier) {                                                // If no valid id
 redirect('account/bookings/'); // Redirect
}

echo $identifier;


$booking = Booking::action()->get_by_id($identifier);

if (!$booking) {
 redirect('account/bookings/'); // Redirect
}


$data = [
 'deleted_by_stylist' => 1
];

$delete = Booking::action()->update($data, $booking['id']);

if ($delete) {
 $_SESSION['success'] = 'this booking has been deleted successfully';
} else {
 $_SESSION['failure'] = 'something went wrong';
}
redirect('account/bookings');
