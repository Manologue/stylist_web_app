<?php

use StylistCommerce\CMS\ServiceCreated;
use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\UserCategory;

is_stylist(Session::action()->role);                                // Check if stylist



if (isset($_POST['service_id'])) {

 $service_id = (int) $_POST['service_id'];
 $category_id = (int) $_POST['category_id'];
 $user_id = (int) $_POST['user_id'];

 $user_category = [
  'category_id' => $category_id,
  'user_id' => $user_id,
 ];

 // echo '<pre>';
 // var_dump($user_category);
 // echo '</pre>';

 // die;

 $deleted = ServiceCreated::action()->delete($service_id);
 $check_service_created = ServiceCreated::action()->get_all(false, $user_id, $category_id);

 if ($deleted) {
  $_SESSION['success'] = "deleted successfully";
  if (!$check_service_created) {
   UserCategory::action()->delete($user_category);
  }
 } else {
  $_SESSION['failed'] = "delete failed try later";
 }
 redirect('account/services');               // Redirect
}
