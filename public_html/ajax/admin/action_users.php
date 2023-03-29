<?php

include '../../../src/bootstrap.php';


use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;

is_admin(Session::action()->role);                                // Check if admin







if (isset($_GET['edit'])) {
 $id = $_GET['edit'];

 $user = User::action()->get_by_id($id);


 echo json_encode($user);
}
