<?php

include '../../../src/bootstrap.php';

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin

if (isset($_GET['delete'])) {
 $identifier = $_GET['delete'];


 if ($identifier) {                                               // If valid id
  $category = Category::action()->get($identifier, false);      // Get Category data
  if (!$category) {                                     // If  empty
   echo 'false';
   die;
  }
 }

 $image = $category['image'];

 $direction = APP_ROOT . '/public/uploads/' . $image;

 if ($image == "" || $image == "blank.png") {
  echo 'false';
 } else {
  $category_image['image'] = "blank.png";
  $updated = Category::action()->update($category_image, $identifier, null, null);
  if ($updated) {
   if (file_exists($direction)) {                        // If image file exists
    unlink($direction);                               // Delete previous image file
   }
   // redirect('admin/category/' . $identifier, ['success' => 'picture removed successfully']); // Redirect
   echo 'true';
  }
 }
}
