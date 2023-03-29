<?php

use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\User;





is_stylist(Session::action()->role);                                // Check if stylist


$temp        = $_FILES['picture']['tmp_name'] ?? '';       // Temporary picture
$success = "";
$failure = "";

$destination = '';                                       // Where to save file
$saved       = null;                                     // Did article save



$errors = [
 'bio' => '',
 'years_exp'     => '',
 'price_starter'     => '',
 'picture' => '',
 'warning' => '',
];

$user = User::action()->get_by_id($_SESSION['id']);

$profile = [
 'bio' => $user['bio'],
 'years_exp' => $user['years_exp'],
 'price_starter' => $user['price_starter'],
 'picture' => $user['picture'],
];



if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If form submitted
 // If file bigger than limit in php.ini or .htaccess store error message
 $errors['picture'] = ($_FILES['picture']['error'] === 1) ? 'File too big ' : '';

 if ($temp and $_FILES['picture']['error'] == 0) {      // Check file
  // Validate picture file
  $errors['picture'] = in_array(mime_content_type($temp), MEDIA_TYPES)
   ? '' : 'Wrong file type. ';                                // Check file type
  $extension = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION)); // File extension in lowercase
  $errors['picture'] .= in_array($extension, FILE_EXTENSIONS)
   ? '' : 'Wrong file extension. ';                           // Check file extension
  $errors['picture'] .= ($_FILES['picture']['size'] <= MAX_SIZE)
   ? '' : 'File too big. ';                                   // Check size of picture

  // If picture file is valid, specify the location to save it
  if ($errors['picture'] === '') { // If valid
   $profile['picture'] = create_filename($_FILES['picture']['name'], UPLOADS);
   $destination = UPLOADS . $profile['picture'];          // Destination

  }
 }

 // Get article data
 $profile['bio']       = $_POST['bio'];
 $profile['years_exp']     = $_POST['years_exp'];
 $profile['price_starter']     = $_POST['price_starter'];


 $errors['years_exp'] = ($profile['years_exp'] == 0) ? "years of experience cannot be 0" : "";
 $errors['price_starter'] = ($profile['price_starter'] == 0) ? "price starter cannot be 0" : "";

 $invalid = implode($errors);

 // Check if data is valid, if so update database
 if ($invalid) {                                                     // If invalid data
  $errors['warning'] = 'Please correct form errors';              // Store error
 } else {                                                            // Otherwise
  $arguments = $profile;                                          // Save data as $arguments
  $saved = User::action()->update($arguments, $_SESSION['id'], $temp, $destination); // Update article
 }

 if ($saved == true) {                                            // If updated
  $success = "profile updated successfully";
  $_SESSION['picture'] = $profile['picture'];
  // redirect('account/profile/'); // Redirect
 } else {                                                         // Otherwise
  $errors['warning'] = 'something went wrong';         // Store message
 }
}


include APP_ROOT . '/templates/account/profile.php';
