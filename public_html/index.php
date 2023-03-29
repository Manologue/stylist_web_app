<?php


include '../src/bootstrap.php';
$path  = mb_strtolower($_SERVER['REQUEST_URI']);             // Get path in lowercase
$path  = substr($path, strlen(DOC_ROOT));                    // Remove up to DOC_ROOT
$parts = explode('/', $path);                                // Split into array at /




// routes configuration
if ($parts[0] == 'admin' || $parts[0] == 'account') {
 if ($parts[0] == 'admin') {
  $page = 'admin/' . ($parts[1] ?? '');
  $identifier   = $parts[2] ?? null;
 }
 if ($parts[0] == 'account') {
  $page = 'account/' . ($parts[1] ?? '');
  $identifier   = $parts[2] ?? null;
  // if ($identifier == null) {  // never enter account with no identifier
  //  $page = 'error';
  // }
 }
} else {
 $page = $parts[0] ?: 'index';
 $identifier   = $parts[1] ?? null;
 if (isset($parts[2])) {
  if ($parts[0] === 'stylist' && $parts[2] === 'cart' && isset($parts[3])) {

   $page = $parts[3];
  } else {
   $page = 'error';
  }
 }
}



if (strpos($_SERVER['REQUEST_URI'], "authenticate") === false && strpos($_SERVER['REQUEST_URI'], "success") === false) {  // for security reasons
 foreach ($_SESSION as $key => $value) {
  if (is_string($key)) {
   // echo $key;
   if (strpos($key, "valid_date_time_") !== false) {
    unset($_SESSION[$key]);
   }
  }
 }
}

if (strpos($_SERVER['REQUEST_URI'], "success") === false) { // destroy all sessions after successfull booking
 if (isset($_SESSION['success_booking'])) {
  if (session_status() === PHP_SESSION_NONE) {
   session_start();
  }
  $_SESSION = [];
  session_destroy();
 }
 # code...
}



if (is_int($identifier)) {
 $identifier = filter_var($identifier, FILTER_VALIDATE_INT);                  // Validate ID
}

$php_page = APP_ROOT . '/src/pages/' . $page . '.php';       // Path to PHP page

if (!file_exists($php_page)) {                               // If page not in array
 $php_page = APP_ROOT . '/src/pages/page-not-found.php';  // Include page not found
}


include $php_page;                                           // Include PHP file
