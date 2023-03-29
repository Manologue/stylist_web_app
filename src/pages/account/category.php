<?php

declare(strict_types=1);                                 // Use strict types


use StylistCommerce\CMS\ServiceProposal;
use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\Session;



is_stylist(Session::action()->role);                                // Check if stylist


if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}

$category = Category::action()->get_by_id($identifier);

if (!$category) {                                          // If category is empty
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}



$services = ServiceProposal::action()->get_all($identifier);

// echo '<pre>';
// var_dump($services);
// echo '</pre>';

// die;
include APP_ROOT . '/templates/account/category.php';
