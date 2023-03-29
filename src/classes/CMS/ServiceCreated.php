<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class ServiceCreated extends CMS {

        protected static $instance;
        protected $table = "service_created";


        public static function action() {
                if (!self::$instance) {
                        self::$instance = new self();
                }
                return self::$instance;
        }

        public function create($values) {
                //check duplication before
                try {
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
        public function update($values, $id) {
                // check duplication before
                try {
                        //code...
                        Database::table($this->table)->update($values)->where("id = :id", ["id" => $id]);
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




        public function get_all($published = true, $user = null, $category = null, $limit = 10000) {
                $arguments['user'] = $user;             // User id
                $arguments['user1'] = $user;             // User id
                $arguments['category']  = $category;             // Category id
                $arguments['category1'] = $category;             // Category id
                $arguments['limit']     = $limit;                // Max articles to return


                $sql = "SELECT sc.id, sc.title as service, sc.description, 
                  sc.price, c.id as category_id, c.title as category, 
                  u.first_name, u.name, u.id as user_id
                  FROM service_created AS sc
                  JOIN user AS u ON sc.user_id = u.id
                  JOIN category AS c ON sc.category_id = c.id
                  
                WHERE (sc.user_id = :user OR :user1 is null)
                AND (sc.category_id = :category OR :category1 is null) ";

                if ($published) {                                // If must be published
                        $sql .= "AND u.published = 1 ";              // Add clause to SQL
                }

                $sql .= "ORDER BY c.id DESC LIMIT :limit;";



                return Database::table($this->table)->query($sql, $arguments)->fetchAll();
        }

        public function count_user_services($user) {
                $arguments['user'] = $user;             // User id

                $sql = "SELECT COUNT(user_id) FROM service_created WHERE user_id = :user;";

                return Database::table($this->table)->query($sql, $arguments)->fetchColumn();
        }
}
