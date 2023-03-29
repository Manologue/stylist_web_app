<?php

use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;

is_admin(Session::action()->role);                                // Check if admin

$failure  = $_GET['failure'] ?? null;            // Check for failure message
$success  = $_GET['success'] ?? null;            // Check for success message

$stylist = [
 'role' => '',
 'published' => 0,
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {              // If form submitted
 $stylist['published'] = isset($_POST['published']) ? 1 : 0;
 $stylist['role'] = $_POST['role'];
 $id = $_POST['id'];



 $save = User::action()->update($stylist, $id, null, null);
 if ($save) {
  $success = 'User ' . $id . ' updated successfully';
 } else {
  $failure = 'Something went wrong. Please try again.';
 }
}


$users = User::action()->getAll(false);

include APP_ROOT . '/templates/admin/users.php';
