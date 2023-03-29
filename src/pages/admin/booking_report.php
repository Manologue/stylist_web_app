<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin






if ($identifier) {                                               // If valid id
 $booking_report = Booking::action()->get_report($identifier);      // Get Category data


 if (!$booking_report) {                                     // If  empty
  $_SESSION['failure'] = 'report not found';
  redirect('admin/bookings/'); // Redirect
 }

 $booking = Booking::action()->get_by_id($identifier);
 if ($booking['deleted_by_admin'] == 1) {
  $_SESSION['failure'] = 'report not found';
  redirect('admin/bookings/'); // Redirect
 }
} else {
 redirect('admin/bookings/');
}











include APP_ROOT . '/templates/admin/booking_report.php';
