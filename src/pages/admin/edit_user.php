<?php

use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;

is_admin(Session::action()->role);                                // Check if admin


$user = [
 'role' => '',
 'published' => 0,
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {              // If form submitted
 $user['published'] = isset($_POST['published']) ? 1 : 0;
 $user['role'] = $_POST['role'];
 $id = $_POST['id'];



 $save = User::action()->update($user, $id);
 if ($save) {
  redirect('admin/users/', ['success' => 'user saved']); // Redirect
 } else {
  redirect('admin/users/', ['failure' => 'something went wrong please try again later']); // Error
 }
}

include APP_ROOT . '/templates/admin/users.php';
