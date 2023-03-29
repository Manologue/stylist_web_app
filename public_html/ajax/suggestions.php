<?php

use StylistCommerce\CMS\Location;

include '../../src/bootstrap.php';

if (isset($_GET['search'])) {
 $value = $_GET['search'];


 $results = Location::action()->search($value);

 echo json_encode($results);
}
