<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;

is_stylist(Session::action()->role);                                // Check if admin



if ($identifier) {                                               // If valid id
 $booking_report = Booking::action()->get_report($identifier);      // Get Category data

 if (!$booking_report) {                                     // If  empty
  $_SESSION['failure'] = 'report not found';
  redirect('account/bookings/'); // Redirect
 }

 $booking = Booking::action()->get_by_id($identifier);

 if ($booking['deleted_by_stylist'] == 1) {
  $_SESSION['failure'] = 'report not found';
  redirect('account/bookings/'); // Redirect
 }
 if ($booking['status'] == 'cancelled') {
  $_SESSION['failure'] = 'report not found';
  redirect('account/bookings/'); // Redirect
 }
 if ($_SESSION['id'] !== $booking['user_id']) {
  $_SESSION['failure'] = 'report not found';
  redirect('account/bookings/'); // Redirect
 }
 if ($booking['admit'] == 'no') {
  $_SESSION['failure'] = 'report not found';
  redirect('account/bookings/'); // Redirect
 }
} else {
 redirect('account/bookings/');
}











include APP_ROOT . '/templates/account/booking_report.php';
