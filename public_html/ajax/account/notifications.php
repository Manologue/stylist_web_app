<?php

use StylistCommerce\CMS\Notification;
use StylistCommerce\CMS\Session;

include '../../../src/bootstrap.php';


is_stylist(Session::action()->role);                                // Check if admin

$notifs = Notification::action()->get_notifications($_SESSION['id']);
$notifs_status = Notification::action()->get_notifications($_SESSION['id'], true);

if (isset($_GET['read'])) {

 $output = "";

 if ($notifs) {
  foreach ($notifs as $notification) {
   if (strpos($notification['subject'], 'user') !== false) {
    $icon = '<i class="mdi mdi-account-plus"></i>';
    $bg = 'bg-info';
   } else {
    $icon = '<i class="mdi mdi-comment-account-outline"></i>';
    $bg = 'bg-primary';
   }
   $time = get_time_ago(strtotime($notification['created_at']));

   $output .= "
    <a href='javascript:void(0);' class='dropdown-item notify-item'>
    <div class='notify-icon {$bg}'>
      {$icon}
    </div>
    <p style='max-width:300px;' class='notify-details'>{$notification['subject']} </br>
      {$notification['body']}
      <small class='text-muted'>{$time}</small>
    </p>
   </a>
   ";
  }
 }
 echo $output;
}


if (isset($_GET['delete'])) {
 foreach ($notifs as $notification) {
  Notification::action()->delete($notification['id']);
 }
}

if (isset($_GET['set_status'])) {

 $data = [
  'status' => 1
 ];

 foreach ($notifs_status as $notification) {
  Notification::action()->update($data, $notification['id']);
 }
}

if (isset($_GET['check_status'])) {
 if ($notifs_status) {
  echo 'true';
 } else {
  echo 'false';
 }
}
