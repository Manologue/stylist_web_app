<?php

use StylistCommerce\CMS\Session;
use StylistCommerce\CMS\UserGallery;

is_stylist(Session::action()->role);                                // Check if stylist


$success  = ($_SESSION['success']) ?? null;            // Check for success message
$failure  = ($_SESSION['failure']) ?? null;            // Check for failure message

if (isset($_SESSION['success'])) {
 unset($_SESSION['success']);
}
if (isset($_SESSION['failure'])) {
 unset($_SESSION['failure']);
}

$partial = '';
$saved = null;

$count_uploaded_files = 0;

$errors = [
 'files' => [],
];




if (isset($_FILES['files'])) {

 $names = $_FILES['files']['name'];
 $tmp_names = $_FILES['files']['tmp_name'];
 $upload_data = array_combine($names, $tmp_names);

 $i = 0;
 foreach ($upload_data as $image_name => $temp_folder) {

  $errors['files'][$i] = ($_FILES['files']['error'][$i] === 1) ? 'File' . $image_name . ' is too big ' : '';

  if ($_FILES['files']['error'][$i] == 0) { // Check file
   $errors['files'][$i] = in_array(mime_content_type($temp_folder), MEDIA_TYPES)
    ? '' : 'Wrong file type. '; // Check file type

   $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION)); // File extension in lowercase
   $errors['files'][$i] .= in_array($extension, FILE_EXTENSIONS)
    ? '' : ',Wrong file extension. '; // Check file extension
   $errors['files'][$i] .= ($_FILES['files']['size'][$i] <= MAX_SIZE)
    ? '' : ',File too big. '; // Check size of files

   // If files file is valid, specify the location to save it

   if ($errors['files'][$i] === '') { // If valid
    // echo $image_name;
    $gallery['image'] = create_filename($image_name, UPLOADS);
    $destination = UPLOADS . $gallery['image']; // Destination

    $gallery['user_id'] = $_SESSION['id'];

    $arguments = $gallery;                                          // Save data as $arguments
    $saved = UserGallery::action()->create($arguments, $temp_folder, $destination);
    if ($saved == true) {
     $count_uploaded_files++;
    }
   }
  }

  $i++;
 }

 if ($count_uploaded_files === $i && $count_uploaded_files > 0) {
  $success = 'uploaded successfully';
 }
 if ($count_uploaded_files === 0) {
  $failure = 'failed to upload';
 }
 if ($count_uploaded_files !== $i && $count_uploaded_files > 0) {
  $partial = 'only ' . $count_uploaded_files . ' image(s) uploaded successfully';
 }
}

$user_gallery = UserGallery::action()->get_gallery($_SESSION['id']);




include APP_ROOT . '/templates/account/gallery.php';
