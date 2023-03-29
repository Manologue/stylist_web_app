<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page users-page">
  <div class="content">
   <!-- Topbar Start -->
   <?php include("includes/topbar.php") ?>
   <!-- end Topbar -->

   <!-- Start Content-->
   <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
     <div class="col-12">
      <div class="page-title-box">
       <!-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
         <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
         <li class="breadcrumb-item active">Bookings</li>
        </ol>
       </div> -->
       <h4 class="page-title">Users</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->



    <!-- table -->
    <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
    <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
    <div class="users-alert"></div>
    <div class="table-responsive">
     <table class="table table-bordered users-table booking-table table-centered mb-0">
      <thead>
       <tr>
        <th>#</th>
        <th>User</th>
        <th>Email</th>
        <th>Role</th>
        <th>Published</th>
        <th>City of Work</th>
        <th>Address</th>
        <th>Years of exp</th>
        <th>Joined</th>
        <th>Tel</th>
        <th>Price Starter</th>
        <th>Zip code</th>
        <th>Edit User</th>
        <th class="text-center">User Profile</th>
       </tr>
      </thead>
      <tbody>
       <?php foreach ($users as $user) { ?>
        <?php
        if ($user['role'] == 'admin') { // if admin skip the admin
         continue;
        }
        ?>
        <tr>
         <td><?= html_escape($user['id']) ?></td>
         <td class="table-user">
          <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($user['picture']) ?>" alt="table-user" class="me-2 rounded-circle" />
          <?= html_escape($user['first_name']) ?> <?= html_escape($user['name'])  ?>
         </td>
         <td><?= html_escape($user['email']) ?></td>
         <td><?= html_escape($user['role']) ?></td>
         <?php if ($user['published'] == 1) { ?>
          <td>yes</td>
         <?php } else { ?>
          <td>no</td>
         <?php } ?>
         <td><?= html_escape($user['city_of_work']) ?></td>
         <td><?= html_escape($user['adress']) ?></td>
         <td><?= html_escape($user['years_exp']) ?></td>
         <td><?= html_escape($user['joined']) ?></td>
         <td><?= html_escape($user['tel']) ?></td>
         <td><?= html_escape($user['price_starter']) ?></td>
         <td><?= html_escape($user['zip_code']) ?></td>
         <td><a data-bs-toggle='modal' data-bs-target='#edit-modal' class="edit-btn" data-id="<?= html_escape($user['id']) ?>" href="">Edit</a></td>
         <td class="table-action text-center">
          <a href="<?= DOC_ROOT ?>stylist_profile/<?= html_escape($user['url_address']) ?>" class="action-icon"> <i class="dripicons-preview"></i></a>
         </td>
        </tr>
       <?php } ?>
      </tbody>
     </table>
    </div>
   </div>





   <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-body">
       <div class="text-center mt-2 mb-4">
        <a href="index.html" class="text-success">
         <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
        </a>
       </div>
       <!-- #region -->
       <!-- the edit part is done with ajax in admin.js -->
       <form action="<?= DOC_ROOT ?>admin/users" method="POST" enctype="multipart/form-data" class="ps-3 pe-3">
        <div class="mb-3">
         <label for="role" class="form-label">Role</label>
         <select class="form-control" name="role" id="role">
          <option value="stylist">stylist</option>
          <option value="suspended">suspended</option>
         </select>
        </div>

        <div class="mb-3">
         <label for="published" class="form-label">published</label>
         <input type="checkbox" name="published" id="published">
        </div>

        <input type="hidden" name="id" id="id">

        <div class="mb-3 text-center">
         <button class="btn btn-primary" id="edit-btn" type="submit">Update User</button>
        </div>
       </form>
      </div>
     </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   <!-- content -->




   <!-- Footer Start -->
   <?php include("includes/content-footer.php") ?>
   <!-- end Footer -->

  </div>

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->


 </div>
 <!-- END wrapper -->

 <!-- Right Sidebar -->
 <?php include("includes/end-bar.php") ?>
 <div class="rightbar-overlay"></div>
 <!-- /End-bar -->

 <!-- bundle -->
 <?php include("includes/footer.php") ?>