<?php

namespace StylistCommerce\CMS;

class Database {
  protected static $instance;
  protected static $con;
  protected static $table;

  protected $query;

  protected $values = array();
  protected $query_type = "select";


  public static function connection() {
    return self::$con;
  }


  public static function table($table) {

    self::$table = $table;

    if (!self::$instance) {
      self::$instance = new self();
    }
    if (!self::$con) {

      try {
        $string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        self::$con = new \PDO($string, DBUSER, DBPASS);
        self::$con->setAttribute(\PDO::ATTR_EMULATE_PREPARES, FALSE);
        self::$con->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        self::$con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      } catch (\PDOException $e) {
        echo $e->getMessage();
        die;
      }
    }
    return self::$instance;
  }


  protected function run($values = array()) {
    // echo $this->query;
    // die;

    if (count($values) > 0) {

      $statement =  self::$con->prepare($this->query);
      $statement->execute($values);
      return $statement;
    }
    return
      self::$con->query($this->query);
  }

  public function all() {
    return $this->run();
  }


  public function where($query, $values = array(), $is_where = true) {
    $where = "";
    if ($is_where) {
      $where = " WHERE ";
    }
    switch ($this->query_type) {

      case 'update':
        $values = array_merge($this->values, $values);
        $this->query .= $where .  $query;
        return $this->run($values);
        // break;
      default:
        // for select && delete
        $this->query .= $where .  $query;
        return $this->run($values);
        // break;
    }
  }

  /******************************** CRUD  ************************/
  // READ
  public function select() {
    $this->query_type = "select";
    $this->query = "SELECT * FROM " . self::$table . " ";
    return self::$instance;
  }

  // UPDATE
  public function update(array $values) {
    $this->query_type = "update";
    $this->query = "UPDATE " . self::$table . " SET ";
    foreach ($values as $key => $value) {
      $this->query .= $key . "= :" . $key . ",";
    }
    $this->query = trim($this->query, ",");
    $this->values = $values;

    return self::$instance;
  }

  // INSERT(CREATE)
  public function insert(array $values) {
    $this->query_type = "insert";
    $this->query = "INSERT INTO " . self::$table . " (";

    //add the columns
    foreach ($values as $key => $value) {
      $this->query .= $key . ",";
    }
    $this->query = trim($this->query, ",");
    $this->query .= ") values (";


    // add the values
    foreach ($values as $key => $value) {
      $this->query .= ":" . $key . ",";
    }
    $this->query = trim($this->query, ",");
    $this->query .= ")";

    $this->values = $values;

    return $this->run($this->values);
    // return self::$instance;
  }


  // DELETE
  public function delete() {
    $this->query_type = "delete";
    $this->query = "DELETE FROM " . self::$table . " ";

    return self::$instance;
  }
  /******************************** END OF CRUD  ************************/




  // custom queries 
  public function query($query, $values = array()) {

    $this->query = $query;
    return $this->run($values);
  }
}
