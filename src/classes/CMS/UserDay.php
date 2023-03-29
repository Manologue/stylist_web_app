<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class UserDay extends CMS {

 protected static $instance;
 protected $table = "user_day";



 public static function action() {
  if (!self::$instance) {
   self::$instance = new self();
  }
  return self::$instance;
 }

 public function create($user) {
  try {
   //code...
   Database::table($this->table)->insert($user);
   return true;
  } catch (\Exception $e) {
   if (($e instanceof \PDOException) and ($e->errorInfo[1] === 1062)) { // If error is integrity constraint
    return false; // Return false
   } else { // For all other reasons
    throw $e; // Re-throw exception
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

 public function get_date_time($user = null, $day = null, $order_of_days = true, $published = true) {
  $arguments['user']  = $user;
  $arguments['user1'] = $user;
  $arguments['day'] = $day;
  $arguments['day1'] = $day;
  $sql = "SELECT ud.day_id AS day, ud.time AS time_range, ud.id
            FROM user_day AS ud
            JOIN user AS u ON ud.user_id = u.id

            WHERE (ud.user_id = :user OR :user1 is null) 
            AND (ud.day_id   = :day   OR :day1   is null) ";

  if ($published) {                                // If must be published
   $sql .= "AND u.published = 1 ";                // Add clause to SQL
  }

  if ($order_of_days) {   // by order of days from 1 to 7 
   $sql .= "GROUP BY ud.day_id";
  }

  return Database::table("user_day")->query($sql, $arguments)->fetchAll();
 }
}
