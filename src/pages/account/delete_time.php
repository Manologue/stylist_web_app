<?php

use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\UserDay;

is_stylist(Session::action()->role);                                // Check if stylist


if (!$identifier) {                                                // If no valid id
 include APP_ROOT . '/src/pages/page-not-found.php';    // Page not found
 die;
}


$time = UserDay::action()->get_by_id($identifier);



$deleted = UserDay::action()->delete($identifier);



if ($deleted) {
 $_SESSION['success'] = 'day time deleted successfully';
} else {
 $_SESSION['failure'] = 'something went wrong';
}
redirect('account/availability');
