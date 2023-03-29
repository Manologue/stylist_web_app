<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class User extends CMS {

  protected static $instance;
  protected $table = "user";



  public static function action() {
    if (!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function create($user) {
    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);  // Hash password
    try {
      //code...
      Database::table($this->table)->insert($user);
      return true;
    } catch (\Exception $e) {
      if (($e instanceof \PDOException) and ($e->errorInfo[1] === 1062)) { // If error is integrity constraint
        return false;                            // Return false
      } else {                                     // For all other reasons
        throw $e;                                // Re-throw exception
      }
    }
  }

  public function update($user, $id, $temporary, $destination) {
    // check duplication before
    try {
      if ($destination) {                          // If image uploaded
        // Crop and save file
        $imagick = new \Imagick($temporary);     // Object to represent image
        $imagick->cropThumbnailImage(1200, 700); // Create cropped image
        $imagick->writeImage($destination);      // Save file
      }
      //code...
      Database::table($this->table)->update($user)->where("id = :id", ["id" => $id]);
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

  public function login(string $email, string $password) {
    $user = $this->action()->get_by_email($email);
    if (!$user) {                                             // If no member found
      return false;                                           // Return false
    }                                                           // Otherwise
    $authenticated = password_verify($password, $user['password']); // Did password match
    return ($authenticated ? $user : false);                  // Return whether password matched
  }

  public function getUserByState(string $state, $id = null) {
    if ($id) {
      return Database::table($this->table)->select()->where("state = :state AND id != :id", ['state' => $state, 'id' => $id])->fetchAll();
    }
    return Database::table($this->table)->select()->where("state = :state", ['state' => $state])->fetchAll();
  }
}
