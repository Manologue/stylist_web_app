<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class Day extends CMS {

 protected static $instance;
 protected $table = "day";



 public static function action() {
  if (!self::$instance) {
   self::$instance = new self();
  }
  return self::$instance;
 }

 public function get_all() {

  return  Database::table($this->table)->select()->all()->fetchAll();
 }
}
