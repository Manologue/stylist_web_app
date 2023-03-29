<?php

namespace StylistCommerce\CMS;

use StylistCommerce\CMS\Database;

class Token extends CMS {

 protected static $instance;
 protected $table = "token";



 public static function action() {
  if (!self::$instance) {
   self::$instance = new self();
  }
  return self::$instance;
 }



 // Create a new token (requires member id and purpose of token)
 public function create(int $id, string $purpose): string {
  $arguments['token']     = bin2hex(random_bytes(64));                   // Token
  $arguments['expires']   = date("Y-m-d H:i:s", strtotime('+4 hours'));  // Expiry
  $arguments['user_id'] = $id;                                         // Member id
  $arguments['purpose']   = $purpose;                                    // Purpose
  $sql     = "INSERT INTO token (token, user_id, expires, purpose)
                 VALUES (:token, :user_id, :expires, :purpose);"; // SQL to add token to database
  Database::table($this->table)->query($sql, $arguments);
  // Run SQL statement
  return $arguments['token'];                                    // Return new token
 }

 // Check if token is valid
 public function getMemberId(string $token, string $purpose): ?int {
  $sql = "SELECT user_id
               FROM token
              WHERE token = :token AND purpose = :purpose
                AND expires > NOW();";                                                          // SQL to check if token is valid and
  return Database::table($this->table)->query($sql, ['token' => $token, 'purpose' => $purpose])->fetchColumn(); // Run SQL and return
 }
}
