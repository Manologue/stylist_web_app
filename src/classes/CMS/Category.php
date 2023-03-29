<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class Category extends CMS {

  protected static $instance;
  protected $table = "category";



  public static function action() {
    if (!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function create($category, $temporary, $destination) {
    //check duplication before
    try {
      if ($destination) {  // If image uploaded
        // Crop and save file
        $imagick = new \Imagick($temporary);     // Object to represent image
        $imagick->cropThumbnailImage(1200, 700); // Create cropped image
        $imagick->writeImage($destination);      // Save file
      }
      //code...
      Database::table($this->table)->insert($category);

      return true;
    } catch (\Exception $e) {
      if (($e instanceof \PDOException) and ($e->errorInfo[1] === 1062)) { // If error is integrity constraint
        return false;                            // Return false
      } else {                                     // For all other reasons
        throw $e;                                // Re-throw exception
      }
    }
  }
  public function update($category, $id, $temporary, $destination) {
    // check duplication before
    try {
      if ($destination) {                          // If image uploaded
        // Crop and save file
        $imagick = new \Imagick($temporary);     // Object to represent image
        $imagick->cropThumbnailImage(1200, 700); // Create cropped image
        $imagick->writeImage($destination);      // Save file
      }
      //code...
      unset($category['seo_category'], $category['id']);
      Database::table($this->table)->update($category)->where("id = :id", ["id" => $id]);
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
      return true;                                 // It worked, return true
    } catch (\PDOException $e) {
      if ($e->errorInfo[1] === 1451) {             // If integrity constraint
        return false;                            // Return false
      } else {                                     // If any other exception
        throw $e;                                // Re-throw exception
      }
    }
  }


  //**** select categories that stylist users choosed only  */


  // only display categories that users that are valid(ie not suspended, stylist and published) have chosen 
  public function get_all($published = true) {

    $sql = "SELECT c.id, c.title, c.image, c.published, c.seo_title, c.description, c.content 
  FROM user_category AS uc
    JOIN user AS u ON uc.user_id = u.id
    JOIN category AS c ON uc.category_id = c.id 
  WHERE c.published = 1 ";

    if ($published) {                                // If must be published
      $sql .= "AND u.published = 1 AND u.role = 'stylist' ";              // Add clause to SQL
    }

    $sql .= "GROUP BY c.id";

    return Database::table("user_category")->query($sql)->fetchAll();
  }
}
