<?php

use StylistCommerce\CMS\Booking;
use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\Notification;

is_admin(Session::action()->role);                                // Check if admin




if (!$identifier) {                                                // If no valid id
 redirect('admin/bookings/'); // Redirect
}



$booking = Booking::action()->get_by_id($identifier);



if (!$booking) {
 redirect('admin/bookings/'); // Redirect
}


$data = [
 'admit' => ''
];



if ($booking['admit'] === 'no') {
 $data['admit'] = 'yes';
 $notification = [
  'subject' => 'new booking',
  'user_id' => $booking['user_id'],
  'body' => 'new booking with id ' . $booking['id']
 ];
} else {
 $data['admit'] = 'no';
 $notification = [
  'subject' => 'booking',
  'user_id' => $booking['user_id'],
  'body' => 'A booking with id ' . $booking['id'] . ' was removed from your list'
 ];
}



$save = Booking::action()->update($data, $identifier);
if ($save) {
 $_SESSION['success'] = 'changed successfully';

 $add_notif = Notification::action()->create($notification);


 redirect('admin/bookings/'); // Redirect
} else {
 $_SESSION['failure'] = 'something went wrong';
 redirect('admin/bookings/'); // Error
}


include APP_ROOT . '/templates/admin/users.php';
