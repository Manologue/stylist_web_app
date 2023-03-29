<?php


use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\UserGallery;

is_stylist(Session::action()->role);                                // Check if stylist


if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}


$user_gallery = UserGallery::action()->get_by_id($identifier);

if (!$user_gallery) {                                          // If category is empty
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}



$direction = APP_ROOT . '/public/uploads/' . $user_gallery['image'];

// echo '<pre>';
// var_dump($user_gallery);
// echo '</pre>';
$deleted = UserGallery::action()->delete($identifier);

if ($deleted) {
 $_SESSION['success'] = 'deleted successfully';
 if (file_exists($direction)) {                        // If image file exists
  unlink($direction);                               // Delete previous image file
 }
} else {
 $_SESSION['failure'] = 'could not delete';
}

redirect('account/gallery');
