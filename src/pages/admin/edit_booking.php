<?php

use StylistCommerce\CMS\User;
use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\Notification;


is_admin(Session::action()->role);                                // Check if stylist


if (!$identifier) {                                                // If no valid id
 redirect('admin/bookings/'); // Redirect
}


$booking = Booking::action()->get_by_id($identifier);


if (!$booking || $booking['status'] === 'completed') {
 redirect('admin/bookings/'); // Redirect
}



$user = User::action()->get_by_id($booking['user_id']);

if ($booking['admit'] == 'yes') {
 $notif_1 = [
  'subject' => 'booking',
  'user_id' => $booking['user_id'],
  'body' => 'A booking with id ' . $booking['id'] . ' was removed from your list'
 ];
}


$notif_2 = [
 'subject' => 'new booking',
 'user_id' => $booking['user_id'],
 'body' => 'new booking with id ' . $booking['id']
];

// echo $user['state'];

$users = User::action()->getUserByState($user['state'], $user['id']);
$data = [
 'deleted_by_stylist' => 0,
 'status' => 'pending',

];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {              // If form submitted

 $data['user_id'] = $_POST['user_id'];
 $notif_2['user_id'] = $_POST['user_id'];

 $edit = Booking::action()->update($data, $booking['id']);

 if ($edit) {
  if ($notif_1) {
   $add_notif_1 = Notification::action()->create($notif_1);
  }
  $add_notif_2 = Notification::action()->create($notif_2);

  $_SESSION['success'] = 'this booking has been updated successfully';
 } else {
  $_SESSION['failure'] = 'something went wrong';
 }
 redirect('admin/bookings');
}


include APP_ROOT . '/templates/admin/edit_booking.php';
