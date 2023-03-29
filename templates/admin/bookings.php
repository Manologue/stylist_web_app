<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page bookings-page">
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
       <h4 class="page-title">Bookings</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->



    <!-- table -->
    <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
    <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
    <div class="booking-alert"></div>
    <div class="table-responsive">
     <table class="table table-bordered booking-table table-centered mb-0">
      <thead>
       <tr>
        <th>#</th>
        <th>Stylist</th>
        <th>Admission</th>
        <th>Balance</th>
        <th>Currency</th>
        <th>Status</th>
        <th>Timeline</th>
        <th>Tel</th>
        <th>Customer name</th>
        <th>Customer location</th>
        <th>address</th>
        <th>Created at</th>
        <th>Action</th>
        <th>Report</th>
       </tr>
      </thead>
      <tbody>
       <?php foreach ($bookings as $booking) { ?>
        <tr>
         <td><?= html_escape($booking['id']) ?></td>
         <td class="table-user">
          <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($booking['picture']) ?>" alt="table-user" class="me-2 rounded-circle" />
          <?= html_escape($booking['first_name']) ?>
         </td>
         <td><a href="<?= DOC_ROOT ?>admin/admit_stylist/<?= html_escape($booking['id']) ?>" onclick="return confirm('change admission status?')">click </a> <?php if ($booking['admit'] == 'yes') { ?> <span class="text-success">yes</span> <?php } else { ?> <span class="text-danger">no</span> <?php } ?></td>
         <td><?= html_escape($booking['amount']) ?></td>
         <td><?= html_escape($booking['currency']) ?></td>
         <?php if ($booking['status'] === 'pending') { ?><td class="text-warning"><?= html_escape($booking['status']) ?></td> <?php } ?>
         <?php if ($booking['status'] === 'cancelled') { ?><td class="text-danger"><?= html_escape($booking['status']) ?></td> <?php } ?>
         <?php if ($booking['status'] === 'completed') { ?><td class="text-success"><?= html_escape($booking['status']) ?></td> <?php } ?>
         <?php if ($booking['date_time'] < date("Y-m-d H:i:s")) { ?>
          <td class="text-danger">outdated</td>
         <?php } else { ?>
          <td class="text-success">up to date</td>
         <?php } ?>
         <td><?= html_escape($booking['tel']) ?></td>
         <td><?= html_escape($booking['name']) ?></td>
         <td><?= html_escape($booking['location']) ?></td>
         <td><?= html_escape($booking['adress']) ?></td>
         <td><?= html_escape($booking['created_at']) ?></td>
         <td>
          <a href="<?= DOC_ROOT ?>admin/delete_booking/<?= html_escape($booking['id']) ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this item?')"><i class="mdi mdi-delete"></i></a>
          <?php if ($booking['status'] !== 'completed') { ?><a href="<?= DOC_ROOT ?>admin/edit_booking/<?= html_escape($booking['id']) ?>" class="text-success"><i class="uil-edit"></i></a> <?php } ?>
         </td>
         <td><a href="<?= DOC_ROOT ?>admin/booking_report/<?= html_escape($booking['id']) ?>">view</a></td>
        </tr>
       <?php } ?>
      </tbody>
     </table>
    </div>
   </div>
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