<?php

include '../../../src/bootstrap.php';


use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;

is_stylist(Session::action()->role);                                // Check if admin


$id = $_SESSION['id'];



if ($id) {
 $user = User::action()->get_by_id($id);
 if (!$user) {
  echo 'false';
 }
}

$picture = $user['picture'];
$direction = APP_ROOT . '/public/uploads/' . $picture;




if ($picture !== 'empty-profile.png' || $picture !== "") {
 $profile['picture'] = "empty-profile.png";
 $updated = User::action()->update($profile, $id, null, null);
 if ($updated) {
  $_SESSION['picture'] = $profile['picture'];
  if (file_exists($direction)) {                        // If image file exists
   unlink($direction);                               // Delete previous image file
  }
  echo 'true';
 }
} else {
 echo 'false';
}
