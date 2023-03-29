<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class CMS {
 protected $table = "";

 // protected $exceptional_table_on_get_by = "article";



 public function check_column($column) {
  $column = addslashes($column);
  // get colmumns of the table
  $check = Database::table($this->table)->query("show columns from " . $this->table)->fetchAll();
  $all_columns = array_column($check, "Field");
  // check if the column exists in the table
  if (in_array($column, $all_columns)) {
   return true;
  }
  return false;
 }
 /*
* get data using provided column name could be use in parent class 
*/
 public function __call($function, $params) {

  if (strpos($function, "get_by_") !== false) {
   return $this->get_by($function, $params);
  }
  if (strpos($function, "check_duplication_") !== false) {
   return $this->check_duplication($function, $params);
  }
 }




 public function get_by($function, $params) {
  $value = $params[0];
  $query = "";

  // column on function name
  $column = str_replace("get_by_", "", $function);
  $check_column = $this->check_column($column);

  // if ($this->table == $this->exceptional_table_on_get_by) {
  //  $query = $this->exceptional_table_query_on_get_by($column);
  // } else {
  $query = $column . " = :" . $column;
  // }

  /*****  this is optional parameter *****/
  $is_published = isset($params[1]) ? $params[1] : "";
  // check if published column exists
  $check_pubished_column = $this->check_column("published");
  if ($is_published == true && $check_pubished_column == true) {
   $query .= " AND published = 1";
  }
  /****** end of optional *******/

  if ($check_column == true) {
   // if ($this->table == $this->exceptional_table_on_get_by) {
   //  $data = Database::table($this->table)->query($query, [$column => $value])->fetchAll();
   // } else {
   $data = Database::table($this->table)->select()->where($query, [$column => $value])->fetch();
   // }
   return  $data;
  }
  // column does not exists in table
  return false;
 }

 public function check_duplication($function, $params) {
  $value = $params[0];

  $column = str_replace("check_duplication_", "", $function);
  $check_column = $this->check_column($column);

  if ($check_column == true) {
   // check if value exists in column table
   $check_value = Database::table($this->table)->select()->where($column . " = :" . $column, [$column => $value])->fetchAll();

   if (count($check_value) == 0) {
    return true;
   }
   // dublication
   return false;
  }

  // column does not exists in table
  return array();
 }


 public function get($id, $published = true) {
  if ($published) {
   return Database::table($this->table)->select()->where("id = :id AND published = 1", ["id" => $id])->fetch();
  }
  return Database::table($this->table)->select()->where("id = :id", ["id" => $id])->fetch();
 }

 public function getAll($published = true) {
  if ($published) {
   return Database::table($this->table)->select()->where("published = 1 ORDER BY id DESC")->fetchAll();
  }
  return  Database::table($this->table)->select()->where("ORDER BY id DESC", [], false)->fetchAll();
  // return  Database::table($this->table)->select()->all()->fetchAll();
 }
}
