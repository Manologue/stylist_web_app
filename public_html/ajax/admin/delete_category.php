<?php
include '../../../src/bootstrap.php';

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin



if (isset($_POST['delete_category'])) {

 $id = $_POST['category_id'];

 $delete = Category::action()->delete($id);
 // echo $delete;
 if ($delete) {
  echo 'true';
 } else {
  echo 'false';
 }
}
