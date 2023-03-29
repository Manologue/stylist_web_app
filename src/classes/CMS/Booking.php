<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class Booking extends CMS {

    protected static $instance;
    protected $table = "booking";



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
    public function create_report($values) {
        //check duplication before
        try {
            //code...
            Database::table("booking_report")->insert($values);
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
    public function delete_report($booking_id) {
        try {
            Database::table("booking_report")->delete()->where("booking_id = :booking_id", ["booking_id" => $booking_id]);
            return true;                                 // It worked, return true
        } catch (\PDOException $e) {
            if ($e->errorInfo[1] === 1451) {             // If integrity constraint
                return false;                            // Return false
            } else {                                     // If any other exception
                throw $e;                                // Re-throw exception
            }
        }
    }

    public function get_all($published = true, $user = null, $admit = 'yes', $not_deleted_by_admin = true, $not_deleted_by_stylist = true, $cancelled = false) {
        $arguments['user'] = $user;             // User id
        $arguments['user1'] = $user;             // User id

        $sql = "SELECT b.id, u.id as user_id, u.first_name, u.name, u.picture,
  b.amount, b.status, b.currency, b.tel, b.name, b.admit, b.adress, b.zip_code, b.description, b.date_time, b.location, b.email, b.created_at
  FROM booking AS b
      JOIN user AS u ON b.user_id = u.id
  WHERE (b.user_id = :user OR :user1 is null) ";

        if ($published) {                                // If must be published
            $sql .= "AND u.published = 1 ";              // Add clause to SQL
        }

        if ($admit == 'yes') {
            $sql .= "AND b.admit = 'yes' ";
        }
        if ($not_deleted_by_admin) {
            $sql .= "AND b.deleted_by_admin = 0 ";
        }
        if ($not_deleted_by_stylist) {
            $sql .= "AND b.deleted_by_stylist = 0 ";
        }

        if ($cancelled) {
            $sql .= "AND b.status != 'cancelled' ";
        }


        $sql .= "ORDER BY b.id DESC;";

        return Database::table($this->table)->query($sql, $arguments)->fetchAll();
    }


    public function get_report($booking_id) {
        return Database::table('booking_report')->select()->where("booking_id = :booking_id", ["booking_id" => $booking_id])->fetchAll();
    }
}
