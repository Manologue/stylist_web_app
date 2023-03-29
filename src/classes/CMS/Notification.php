<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class Notification extends CMS {

 protected static $instance;
 protected $table = "notification";



 public static function action() {
  if (!self::$instance) {
   self::$instance = new self();
  }
  return self::$instance;
 }

 public function create($value) {
  try {
   //code...
   Database::table($this->table)->insert($value);
   return true;
  } catch (\Exception $e) {
   if (($e instanceof \PDOException) and ($e->errorInfo[1] === 1062)) { // If error is integrity constraint
    return false;                            // Return false
   } else {                                     // For all other reasons
    throw $e;                                // Re-throw exception
   }
  }
 }

 public function update($value, $id) {
  // check duplication before
  try {
   Database::table($this->table)->update($value)->where("id = :id", ["id" => $id]);
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


 public function get_notifications($user_id, $read = false) {
  $query_added = '';
  if ($read == true) {
   $query_added = ' AND status = 0 ';
  }

  return Database::table($this->table)->select()->where("user_id = :user_id $query_added ORDER BY id DESC", ["user_id" => $user_id])->fetchAll();
 }
}
