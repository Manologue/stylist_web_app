<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;


is_admin(Session::action()->role);                                // Check if stylist


if (!$identifier) {                                                // If no valid id
 redirect('admin/bookings/'); // Redirect
}

echo $identifier;


$booking = Booking::action()->get_by_id($identifier);

if (!$booking) {
 redirect('admin/bookings/'); // Redirect
}


$data = [
 'deleted_by_admin' => 1
];

$delete = Booking::action()->update($data, $booking['id']);

if ($delete) {
 $_SESSION['success'] = 'this booking has been deleted successfully';
} else {
 $_SESSION['failure'] = 'something went wrong';
}
redirect('admin/bookings');
