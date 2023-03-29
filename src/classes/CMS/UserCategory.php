<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class UserCategory extends CMS {

  protected static $instance;
  protected $table = "user_category";



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
        return false;                            // Return false
      } else {                                     // For all other reasons
        throw $e;                                // Re-throw exception
      }
    }
  }


  public function delete($arguments) {
    try {
      Database::table($this->table)->delete()->where("user_id = :user_id AND category_id = :category_id", $arguments);
      return true;                                 // It worked, return true
    } catch (\PDOException $e) {
      if ($e->errorInfo[1] === 1451) {             // If integrity constraint
        return false;                            // Return false
      } else {                                     // If any other exception
        throw $e;                                // Re-throw exception
      }
    }
  }



  //**** this is strickly for stylist in user category */
  public function get_all($published = true, $category = null, $user = null, $limit = 10000) {
    $arguments['category']  = $category;             // Category id
    $arguments['category1'] = $category;             // Category id
    $arguments['user'] = $user;             // User id
    $arguments['user1'] = $user;             // User id
    $arguments['limit']     = $limit;                // Max articles to return

    $sql = "SELECT u.id, u.city, u.state, u.years_exp, c.title AS category, 
               u.first_name, u.name, u.price_starter, u.picture, u.url_address, u.city_of_work,
               CONCAT(u.first_name, ' ', u.name) AS username
               FROM user_category AS uc
               JOIN user AS u ON uc.user_id = u.id
               JOIN category AS c ON uc.category_id = c.id

        WHERE (uc.category_id = :category OR :category1 is null) 
          AND (uc.user_id   = :user   OR :user1   is null) ";

    if ($published) {                                // If must be published
      $sql .= "AND u.published = 1 AND u.role = 'stylist' ";              // Add clause to SQL
    }

    // when we want to select as the users
    if ($category == null && $user == null) {
      $sql .= "GROUP BY u.id";
    }
    $sql .= " LIMIT :limit;";

    return Database::table($this->table)->query($sql, $arguments)->fetchAll();
  }

  public function search(string $location, string $services = null, string $day = null, $published = true) {

    if ($day) {
      $day = date('l', strtotime($day));
    }
    $day_name = '%' . $day . '%';
    $services_list  = explode(",", $services);
    // $arguments['location'] = '%' . $location . '%';
    $arguments['location1'] = '%' . $location . '%';


    $sql_custom = "u.state LIKE :location1 ";


    $i = 1;
    if ($services) {
      foreach ($services_list as $service) {
        $arguments["service$i"] = '%' . $service . '%';
        $sql_custom .= "OR c.title LIKE :service$i ";
        $i++;
      }
    }
    if ($day) {
      // echo 'okay day';
      // echo $day;
      $arguments['day'] = $day_name;
      $sql_custom .= "OR d.name LIKE :day";
    }


    $sql = "SELECT u.id, u.city, u.state, u.years_exp, u.city_of_work, c.title AS category, 
               u.first_name, u.name, u.price_starter, u.picture, u.url_address,
               CONCAT(u.first_name, ' ', u.name) AS username
               FROM user_category AS uc
                JOIN user AS u 
                  LEFT JOIN user_day AS ud 
                       INNER JOIN day AS d ON ud.day_id = d.id
                      ON u.id = ud.user_id
                  ON uc.user_id = u.id
                 JOIN category AS c ON uc.category_id = c.id WHERE ";

    $sql .= '(' . $sql_custom . ')';

    if ($published) {

      $sql .= "AND (u.published = 1 AND u.role = 'stylist') ";
    }


    $sql .= "GROUP BY u.id";
    // echo $sql;
    // die;

    return Database::table($this->table)->query($sql, $arguments)->fetchAll();
  }
}
