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
        <th>Balance</th>
        <th>Currency</th>
        <th>Status</th>
        <th>Timeline</th>
        <th>Tel</th>
        <th>Customer name</th>
        <th>address</th>
        <th>Zip code</th>
        <th>Description</th>
        <th>Date time</th>
        <th>Customer location</th>
        <th>Email</th>
        <th>Created at</th>
        <th>Complete</th>
        <th>Cancel</th>
        <!-- <th>Pending</th> -->
        <th>Action</th>
        <th>Report</th>
       </tr>
      </thead>
      <tbody>
       <?php if ($bookings) { ?>
        <?php foreach ($bookings as $booking) { ?>
         <tr>
          <td><?= html_escape($booking['amount']) ?></td>
          <td><?= html_escape($booking['currency']) ?></td>
          <?php if ($booking['status'] == 'pending') { ?>
           <td class="text-warning"><?= html_escape($booking['status']) ?>
           </td>
          <?php } elseif ($booking['status'] == 'cancelled') { ?>
           <td class="text-danger"><?= html_escape($booking['status']) ?>
           </td>
          <?php } else { ?>
           <td class="text-success"><?= html_escape($booking['status']) ?> <div class="text-success"><i class="uil-check"></i></div>
           </td>
          <?php } ?>
          <?php if ($booking['date_time'] < date("Y-m-d H:i:s")) { ?>
           <td class="text-danger">outdated</td>
          <?php } else { ?>
           <td class="text-success">up to date</td>
          <?php } ?>
          <td><?= html_escape($booking['tel']) ?></td>
          <td><?= html_escape($booking['name']) ?></td>
          <td><?= html_escape($booking['adress']) ?></td>
          <td><?= html_escape($booking['zip_code']) ?></td>
          <td><?= html_escape($booking['description']) ?></td>
          <td><?= html_escape($booking['date_time']) ?></td>
          <td><?= html_escape($booking['location']) ?></td>
          <td><?= html_escape($booking['email']) ?></td>
          <td><?= html_escape($booking['created_at']) ?></td>
          <td class="text-center"><a href="<?= DOC_ROOT ?>account/complete_booking/<?= html_escape($booking['id']) ?>" onclick="return confirm('complete the booking')"><i class="uil-file-check-alt"></i></a></td>
          <td class="text-center"><a href="<?= DOC_ROOT ?>account/cancel_booking/<?= html_escape($booking['id']) ?>" class="text-warning" onclick="return confirm('Are you sure you want to cancel this booking?')"><i class="uil-cancel"></i></a></td>
          <td class="text-center"><a href="<?= DOC_ROOT ?>account/delete_booking/<?= html_escape($booking['id']) ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this item?')"><i class="mdi mdi-delete"></i></a></td>
          <td><a href="<?= DOC_ROOT ?>account/booking_report/<?= html_escape($booking['id']) ?>">view</a></td>
         </tr>
        <?php } ?>
       <?php } else { ?>
        <tr>
         <td colspan="15">No bookings found</td>
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