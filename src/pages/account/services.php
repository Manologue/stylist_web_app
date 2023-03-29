<?php

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\ServiceCreated;
use StylistCommerce\CMS\Session;




is_stylist(Session::action()->role);                                // Check if stylist




$categories = Category::action()->getAll();
$user_id = $_SESSION['id'];
$success  = ($_SESSION['success']) ?? null;            // Check for success message
$failure  = ($_SESSION['failure']) ?? null;            // Check for failure message



if (isset($_SESSION['success'])) {
 unset($_SESSION['success']);
}
if (isset($_SESSION['failure'])) {
 unset($_SESSION['failure']);
}


foreach ($categories as $category) {

 $services[] = ServiceCreated::action()->get_all(false, $user_id, $category['id']);
}



// echo '<pre>';
// var_dump($services);
// echo '</pre>';

// die;
include APP_ROOT . '/templates/account/services.php';
