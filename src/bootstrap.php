<?php

use StylistCommerce\CMS\Session;

define('APP_ROOT', dirname(__FILE__, 2)); // Application root

require APP_ROOT . '/src/functions.php'; // Functions
require APP_ROOT . '/config/config.php'; // Configuration data
require APP_ROOT . '/vendor/autoload.php'; // Autoload libraries

if (DEV === false) { // If not in development
   set_exception_handler('handle_exception'); // Set exception handler
   set_error_handler('handle_error'); // Set error handler
   register_shutdown_function('handle_shutdown'); // Set shutdown handler

   // lifetime_session(2073600); // put this in dev = false condition on production
}


// 2073600

Session::action(); // Create session
$date = new \DateTime;

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';


// die;
