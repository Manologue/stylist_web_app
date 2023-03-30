<?php

namespace StylistCommerce\CMS; // Declare namespace

class Session
{
   protected static $instance;

   public $id; // Store user's id
   public $first_name; // Store user's forename
   public $role; // Store user's role

   public $url_address; // Store user's url_address

   public $picture;
   public $timeout = 1000; // before session timeout

   public function __construct()
   { // Runs when object created
      if (session_status() === PHP_SESSION_NONE) { // Start, or restart, session
         session_start();
      }
      $this->id = $_SESSION['id'] ?? 0; // Set id property of this object
      $this->first_name = $_SESSION['first_name'] ?? ''; // Set forename property of this object
      $this->role = $_SESSION['role'] ?? 'public'; // Set role property of this object
      $this->url_address = $_SESSION['url_address'] ?? 'public_00000'; // set url_address property of this object
      $this->picture = $_SESSION['picture'] ?? ''; // set picture property ofsss
   }


   public static function action()
   {
      if (!self::$instance) {
         self::$instance = new self();
      }
      return self::$instance;
   }




   // Create new session
   public function create($user)
   {
      session_regenerate_id(true); // Update session id
      $_SESSION['id'] = $user['id']; // Add user id to session
      $_SESSION['first_name'] = $user['first_name']; // Add forename to session
      $_SESSION['role'] = $user['role']; // Add role to session
      $_SESSION['url_address'] = $user['url_address']; // Add url address to session
      $_SESSION['picture'] = $user['picture']; // Add picture to session
   }

   // Update existing session - alias for create()
   public function update($user)
   {
      $this->create($user); // Update data in session
   }

   // Delete existing session
   public function delete()
   {
      $_SESSION = []; // Empty $_SESSION superglobal
      $param = session_get_cookie_params(); // Get session cookie parameters
      setcookie(
         session_name(),
         '',
         time() - 2400,
         $param['path'],
         $param['domain'],
         $param['secure'],
         $param['httponly']
      ); // Clear session cookie
      session_destroy(); // Destroy the session
   }
}