<?php

declare(strict_types=1);                                 // Use strict types

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\User;
use StylistCommerce\CMS\UserCategory;

if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}
$category = Category::action()->get_by_seo_title($identifier);
// echo '<pre>';
// var_dump($category);
// echo '</pre>';

if (!$category) {                                          // If category is empty
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}

$id = $category['id'];

$users = UserCategory::action()->get_all(true, $id);
$categories = Category::action()->get_all();


$categories_list_page = 'hairdressing';
if (!$users) {  // if no users in the category that is published and not suspended then redirect to home page
 redirect("");
}


// getting each user with all his categories
foreach ($users as $user) {
 $users_infos[] =  UserCategory::action()->get_all(true, null, $user['id']);
}

// $categories = Category::action()->getAll();


include APP_ROOT . '/templates/hairdressing.php';
