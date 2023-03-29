<?php

use StylistCommerce\CMS\Category;
use StylistCommerce\CMS\Session;
use StylistCommerce\Validate\Validate;

is_admin(Session::action()->role);                                // Check if admin



// Initialize variables that the PHP code needs
$temp        = $_FILES['image']['tmp_name'] ?? '';       // Temporary image
$destination = '';                                       // Where to save file
$saved       = null;                                     // Did article save

$success  = $_GET['success'] ?? null;            // Check for success message


// echo $temp;
// Initialize variables needed for the HTML page
$category = [
 'title'       => '',
 'description'     => '',
 'published'   => true,  //checked by default
 'image'  => 'blank.png',

];                                                       // Category data
$errors  = [
 'warning'     => '',
 'title'       => '',
 'description'     => '',
 'image'  => '',

];                                                       // Errors

// echo '<pre>';
// var_dump($errors);
// echo '</pre>';


// die;
if ($identifier) {                                               // If valid id
 $category = Category::action()->get($identifier, false);      // Get Category data
 if (!$category) {                                     // If  empty
  redirect('admin/categories/', ['failure' => 'Article not found']); // Redirect
 }
}
if ($category['image'] == 'blank.png' || $category['image'] == "") { // Has an image been uploaded
 $saved_image =  false;
} else {
 $saved_image =  true;
}

// echo '<pre>';
// var_dump($category);
// echo '</pre>';
// die;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {              // If form submitted
 // If file bigger than limit in php.ini or .htaccess store error message
 $errors['image'] = ($_FILES['image']['error'] === 1) ? 'File too big ' : '';


 // If image was uploaded, get image data and validate
 if ($temp and $_FILES['image']['error'] == 0) {      // Check file
  // Validate image file
  $errors['image'] = in_array(mime_content_type($temp), MEDIA_TYPES)
   ? '' : 'Wrong file type. ';                                // Check file type
  $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION)); // File extension in lowercase
  $errors['image'] .= in_array($extension, FILE_EXTENSIONS)
   ? '' : 'Wrong file extension. ';                           // Check file extension
  $errors['image'] .= ($_FILES['image']['size'] <= MAX_SIZE)
   ? '' : 'File too big. ';                                   // Check size of image

  // If image file is valid, specify the location to save it
  if ($errors['image'] === '') { // If valid
   $category['image'] = create_filename($_FILES['image']['name'], UPLOADS);
   $destination = UPLOADS . $category['image'];          // Destination

  }
 }


 // Get article data
 $category['title']       = $_POST['title'];
 $category['description']     = $_POST['description'];
 $category['published']   = (isset($_POST['published']) and ($_POST['published'] == 1)) ? 1 : 0;   // Is it published?
 $category['seo_title']   = create_seo_name($category['title']);   // SEO friendly title


 // Check if all data was valid and create error messages if it is invalid
 $errors['title']    = Validate::isText($category['title'], 1, 80)
  ? '' : 'Title should be 1 - 80 characters.';     // Validate title
 $errors['description']  = Validate::isText($category['description'], 1, 254)
  ? '' : 'Description should be 1 - 254 characters.';  // Validate description

 $invalid = implode($errors);

 // Check if data is valid, if so update database
 if ($invalid) {                                                     // If invalid data
  $errors['warning'] = 'Please correct form errors';              // Store error
 } else {                                                            // Otherwise
  $arguments = $category;                                          // Save data as $arguments
  if ($identifier) {                                                      // If id exists update
   $saved = Category::action()->update($arguments, $identifier, $temp, $destination); // Update article
  } else {                                                        // No id create

   $saved = Category::action()->create($arguments, $temp, $destination); // Create article
  }

  if ($saved == true) {                                            // If updated
   redirect('admin/categories/', ['success' => 'Category saved']); // Redirect
  } else {                                                         // Otherwise
   $errors['warning'] = 'Category title already in use';         // Store message
  }
 }
 $category['image'] = $saved_image ? $category['image'] : ''; // Remove image if new article
}





include APP_ROOT . '/templates/admin/category.php';
