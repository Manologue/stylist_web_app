<?php

include '../../src/bootstrap.php';

if (session_status() === PHP_SESSION_NONE) {    // Start, or restart, session
  session_start();
}

use StylistCommerce\CMS\User;

if (isset($_GET['read'])) {


  $user_id     = filter_input(INPUT_GET, 'read');
  $_SESSION["user_$user_id"] ?? [];

  if (isset($_SESSION["user_$user_id"])) {
    $count = sizeof($_SESSION["user_$user_id"]);
    $_SESSION["count_services_{$user_id}"] = $count;
  }

  $continuation_of_cart_process = $_GET['continuation_of_cart_process'];
  // echo $continuation_of_cart_process;

  $delete_icon = "";
  if ($continuation_of_cart_process !== 'true') {  // verify if the first step of cart process has been valid to make sure we remove the delete icon
    $delete_icon = "<i class='fa-solid fa-square-xmark'></i>";
  }


  $output = "";
  if (!empty($_SESSION["user_$user_id"])) {
    foreach ($_SESSION["user_$user_id"] as $service) {
      $output .= "
  <div class='info' data-service_id={$service['service_id']} data-user_id={$service['user_id']}>
        <div class='details'>
         <p>{$service['service_title']}</p>
         <span>x{$service['quantity']}</span>
        </div>
        <span class='price'>{$service['service_price']}$ {$delete_icon}</span>
 </div>
  ";
    }
  } else {
    $output = "<div class='info empty'>
  <p>Please add a service offered by this stylist</p>
 </div>";
  }
  echo $output; // return output
}

if (isset($_GET['readTotalPrice'])) {
  $user_id     = filter_input(INPUT_GET, 'readTotalPrice');
  $_SESSION["user_$user_id"] ?? [];
  $output = "";
  $total = 0;
  if (!empty($_SESSION["user_$user_id"])) {
    foreach ($_SESSION["user_$user_id"] as $service) {
      $total +=  $service['service_price'];
    }
  }
  $_SESSION["total_service_amount_$user_id"] = $total;

  $output = "<span class='total-text'>Total:</span>{$total}$";
  echo $output;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['add'])) {
    $service = [];
    $user_id = $service['user_id'] = $_POST['user_id'];
    $service_id = $service['service_id'] = $_POST['service_id'];
    $service['service_title'] = $_POST['service_title'];
    $service['service_price'] = $_POST['service_price'];
    $service['quantity'] = $_POST['add']; // initial quantity 1


    isset($_SESSION["user_$user_id"]["service_$service_id"]) ?? [];
    if (empty($_SESSION["user_$user_id"]["service_$service_id"])) {
      $_SESSION["user_$user_id"]["service_$service_id"] = $service;
    } else {
      $_SESSION["user_$user_id"]["service_$service_id"]['quantity']++;
    }
    $quantity = $_SESSION["user_$user_id"]["service_$service_id"]['quantity'];
    $total = $quantity * $service['service_price'];
    $_SESSION["user_$user_id"]["service_$service_id"]['service_price'] = $total;



    if (isset($_SESSION["user_$user_id"])) {      // count the number of services for the user
      $count = sizeof($_SESSION["user_$user_id"]);
      $_SESSION["count_services_{$user_id}"] = $count;
    }

    if (isset($_SESSION["valid_cart_user_$user_id"])) {    // when changing the location in cart you need to unset the previous valid submitter in select-datetime page
      unset($_SESSION["valid_cart_user_$user_id"]);
    }

    echo "<div class='container'>
     <span><i class='fa-solid fa-circle-check'></i> Added successfully</span>
      </div>";
  } else {
    // for post with no form data
    $request_body = file_get_contents('php://input');
    $data = (array)json_decode($request_body);
    if (isset($data['delete'])) {
      // echo $data['delete'];
      $user_id = $data['user_id'];
      $service_id = $data['service_id'];

      unset($_SESSION["user_$user_id"]["service_$service_id"]);


      if (isset($_SESSION["user_$user_id"])) {             // count the number of services for the user
        $count = sizeof($_SESSION["user_$user_id"]);
        $_SESSION["count_services_{$user_id}"] = $count;
      }


      if (isset($_SESSION["valid_cart_user_$user_id"])) {     // when changing the location in cart you need to unset the previous valid submitter in select-datetime page
        unset($_SESSION["valid_cart_user_$user_id"]);
      }


      echo "<div class='container'>
     <span><i class='fa-solid fa-circle-check'></i>Deleted successfully</span>
      </div>";
    }
  }
}




if (isset($_GET['chosenLocation'])) {
  $user_id = $_GET['user_id'];
  $chosenLocation = $_GET['chosenLocation'];
  $user = User::action()->get_by_id($user_id);
  // $user['city_of_work'];


  $_SESSION["chosenLocation_$user_id"] = "";
  if ($chosenLocation === $user['state']) {   // verify if location is valid 
    $_SESSION["chosenLocation_$user_id"] = 'valid';  // this is for the next page to avoid continuous processing if wrong location
    echo 'true';  // this is for the stylist page to avoid submit if wrong location
  } else {
    $_SESSION["chosenLocation_$user_id"] = 'invalid';   // this is for the next page to avoid continuous processing if wrong location
    echo 'false';  //this is for the stylist page to avoid submit if wrong location
  }
}
