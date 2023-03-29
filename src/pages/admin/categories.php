<?php

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin




$categories = Category::action()->getAll(false);
$success  = $_GET['success'] ?? null;            // Check for success message
$failure  = $_GET['failure'] ?? null;            // Check for failure message




include APP_ROOT . '/templates/admin/categories.php';
