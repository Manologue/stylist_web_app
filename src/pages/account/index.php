<?php

use StylistCommerce\CMS\User;
use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\UserDay;
use StylistCommerce\CMS\UserGallery;
use StylistCommerce\CMS\ServiceCreated;

is_stylist(Session::action()->role);                                // Check if stylist




$counter = 0;
$save = null;
$user = User::action()->get_by_id($_SESSION['id']);

$published = $user['published'];

// check services 
$services = ServiceCreated::action()->get_all(false, $user['id']);

if ($services) {
 $counter++;
}


//availability check

$availability = UserDay::action()->get_date_time($user['id'], null, null, false);

if ($availability) {
 $counter++;
}

// ceheck service location

if ($user['city_of_work']) {
 $counter++;
}

// check price strater and years of experience 
if ($user['price_starter']) {
 $counter++;
}
if ($user['years_exp']) {
 $counter++;
}

$gallery = UserGallery::action()->get_gallery($user['id']);

$data = [
 'published' => 0
];


if ($counter === 5 && $published !== 1) {
 $data['published'] = 1;
 $save = User::action()->update($data, $user['id'], null, null);
}


include APP_ROOT . '/templates/account/index.php';
