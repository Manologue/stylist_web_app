<?php

use StylistCommerce\CMS\Category;

// $categories = Category::action()->getAll();
$categories = Category::action()->get_all();
$today = date('w'); // day of week;
// echo $today;
// die;


// echo get_time_ago(strtotime("2022-12-30 12:20:00"));

// die;
$categories_list_page = 'home';
include APP_ROOT . '/templates/services.php';
