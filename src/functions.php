<?php
// UTILITY FUNCTIONS


function lifetime_session($timeout) {

  ini_set("session.gc_maxlifetime", $timeout); //Set the maxlifetime of the session

  ini_set("session.cookie_lifetime", $timeout);  //Set the cookie lifetime of the session

  session_start();                                 // Start, or restart, session

  $s_name = session_name(); //Set the default session name

  if (isset($_COOKIE[$s_name])) {   //Check the session exists or not
    setcookie($s_name, $_COOKIE[$s_name], time() + $timeout, '/');
    // echo "Session is created for $s_name.<br/>";
  } else {
    echo "<script>alert('votre session a expirée')</script>";
  }
}
function showMessage($type, $message) {
  return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
           <strong>' . $message . '</strong>
           <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
         </div>';
}

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
function html_escape($text): string {
  $text = $text ?? '';
  return htmlspecialchars($text, ENT_QUOTES, 'UTF-8', false); // Return escaped string
}

function is_admin($role) {
  if ($role !== 'admin') {                                   // If role is not admin
    header('Location: ' . DOC_ROOT . 'login');                       // Send to home page
    exit;                                                  // Stop code running
  }
}

function is_stylist($role) {
  if ($role !== 'stylist') {                                   // If role is not admin
    header('Location: ' . DOC_ROOT . 'login');                       // Send to home page
    exit;                                                  // Stop code running
  }
}

function redirect(string $location, array $parameters = [], $response_code = 302) {
  $qs = $parameters ? '?' . http_build_query($parameters) : '';  // Create query string
  $location = $location . $qs;                                   // Create new path
  header('Location: ' . DOC_ROOT . $location, $response_code);   // Redirect to new page
  exit;                                                          // Stop code
}

function create_filename(string $filename, string $uploads): string {
  $basename  = pathinfo($filename, PATHINFO_FILENAME);          // Get basename
  $extension = pathinfo($filename, PATHINFO_EXTENSION);         // Get extension
  $cleanname = preg_replace("/[^A-z0-9]/", "-", $basename);     // Clean basename
  $filename  = $cleanname . '.' . $extension;                   // Destination
  $i         = 0;                                               // Counter
  while (file_exists($uploads . $filename)) {                   // If file exists
    $i        = $i + 1;                                       // Update counter
    $filename = $basename . $i . '.' . $extension;            // New filename
  }
  return $filename;                                             // Return filename
}


function create_seo_name(string $text): string {
  $text = strtolower($text);                                  // Convert text to lowercase
  $text = trim($text);                                        // Remove spaces from start/end
  if (function_exists('transliterator_transliterate')) {      // If transliterator installed
    $text = transliterator_transliterate('Latin-ASCII', $text); // Transliterate
  }
  $text = preg_replace('/ /', '-', $text);                    // Replace spaces with dashes
  $text = preg_replace('/[^-A-z0-9 ]+/', '', $text);          // Remove if not a dash, A-z or 0-9
  return $text;                                               // Return the SEO name
}

// ERROR AND EXCEPTION HANDLING FUNCTIONS
// Convert errors to exceptions
function handle_error($error_type, $error_message, $error_file, $error_line) {
  throw new ErrorException($error_message, 0, $error_type, $error_file, $error_line); // Turn into ErrorException
}

// Handle exceptions - log exception and show error message (if server does not send error page listed in .htaccess)
function handle_exception($e) {
  error_log($e);                        // Log the error
  http_response_code(500);              // Set the http response code
  echo "<h1>Sorry, a problem occurred</h1>   
          The site's owners have been informed. Please try again later.";
}

// Handle fatal errors
function handle_shutdown() {
  $error = error_get_last();            // Check for error in script
  if ($error !== null) {                // If there was an error next line throws exception
    $e = new ErrorException($error['message'], 0, $error['type'], $error['file'], $error['line']);
    handle_exception($e);             // Call exception handler
  }
}


function get_time_ago($time) {
  $time_difference = time() - $time;

  if ($time_difference < 1) {
    return 'less than 1 second ago';
  }
  $condition = array(
    12 * 30 * 24 * 60 * 60 =>  'year',
    30 * 24 * 60 * 60       =>  'month',
    24 * 60 * 60            =>  'day',
    60 * 60                 =>  'hour',
    60                      =>  'minute',
    1                       =>  'second'
  );

  foreach ($condition as $secs => $str) {
    $d = $time_difference / $secs;

    if ($d >= 1) {
      $t = round($d);
      return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
    }
  }
}
