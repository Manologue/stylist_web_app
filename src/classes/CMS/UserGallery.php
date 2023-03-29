<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class UserGallery extends CMS {

 protected static $instance;
 protected $table = "gallery";



 public static function action() {
  if (!self::$instance) {
   self::$instance = new self();
  }
  return self::$instance;
 }

 public function create($values, $temporary, $destination) {
  //check duplication before
  try {
   if ($destination) {  // If image uploaded
    // Crop and save file
    $imagick = new \Imagick($temporary);     // Object to represent image
    $imagick->cropThumbnailImage(700, 700); // Create cropped image
    $imagick->writeImage($destination);      // Save file
   }
   //code...
   Database::table($this->table)->insert($values);

   return true;
  } catch (\Exception $e) {
   if (($e instanceof \PDOException) and ($e->errorInfo[1] === 1062)) { // If error is integrity constraint
    return false;                            // Return false
   } else {                                     // For all other reasons
    throw $e;                                // Re-throw exception
   }
  }
 }


 public function delete($id) {
  try {
   Database::table($this->table)->delete()->where("id = :id", ["id" => $id]);
   return true; // It worked, return true
  } catch (\PDOException $e) {
   if ($e->errorInfo[1] === 1451) { // If integrity constraint
    return false; // Return false
   } else { // If any other exception
    throw $e; // Re-throw exception
   }
  }
 }


 public function get_gallery($user_id) {
  return Database::table($this->table)->select()->where("user_id = :user_id", ["user_id" => $user_id])->fetchAll();
 }
}
