<?php

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin


if ($identifier) {                                               // If valid id
 $category = Category::action()->get($identifier, false);      // Get Category data

 if (!$category) {                                     // If  empty
  redirect('admin/categories/', ['failure' => 'Article not found']); // Redirect
 }
} else {
 redirect('admin/categories/');
}




include APP_ROOT . '/templates/admin/services.php';
