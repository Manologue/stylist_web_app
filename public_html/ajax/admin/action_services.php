<?php
include '../../../src/bootstrap.php';


use StylistCommerce\CMS\ServiceProposal;
use StylistCommerce\CMS\Session;

is_admin(Session::action()->role);                                // Check if admin



if (isset($_POST['add'])) {
  $service = [];

  $service['category_id'] = $_POST['add'];
  $service['title'] = $_POST['title'];
  $service['price'] = $_POST['price'];
  $service['description'] = $_POST['description'];

  $save =  ServiceProposal::action()->create($service);

  if ($save) {
    echo showMessage('success', 'Service inserted successfully!');
  } else {
    echo showMessage('danger', 'Something went wrong!');
  }
}


if (isset($_GET['read'])) {
  $category = $_GET['read'];
  $services = ServiceProposal::action()->get_all($category);

  if ($services) {
    $output = "";
    foreach ($services as $service) {
      $output .= " 
   <tr>
   <th scope='row'>{$service['id']}</th>
   <td>{$service['title']}</td>
   <td>{$service['price']}$</td>
   <td>{$service['description']}</td>
   <td class='table-action text-center'>
    <a href='javascript: void(0);' id={$service['id']} class='action-icon edit-link' data-bs-toggle='modal' data-bs-target='#edit-modal'> <i class='uil-edit'></i></a>
    <a href='javascript: void(0);' id={$service['id']} class='action-icon delete-link'> <i class='mdi mdi-delete'></i></a>
   </td>
  </tr>
   ";
    }
    echo $output;
  } else {
    echo " <tr>
  <td colspan='6'>No Services Found in the Database</td>
   </tr>";
  }
}


if (isset($_GET['edit'])) {
  $id = $_GET['edit'];

  $service = ServiceProposal::action()->get_by_id($id);

  echo json_encode($service);
}

if (isset($_POST['update'])) {
  $service['title'] = $_POST['title'];
  $service['price'] = $_POST['price'];
  $service['description'] = $_POST['description'];
  $id = $_POST['id'];

  $save =  ServiceProposal::action()->update($service, $id);

  if ($save) {
    echo showMessage('success', 'Service updated successfully!');
  } else {
    echo showMessage('danger', 'Something went wrong!');
  }
}


if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $deleted = ServiceProposal::action()->delete($id);
  if ($deleted) {
    echo showMessage('success', 'Service deleted successfully!');
  } else {
    echo showMessage('danger', 'Something went wrong!');
  }
}
