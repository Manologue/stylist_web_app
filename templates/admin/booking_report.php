<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page report-page">
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
       <h4 class="page-title">Reports</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->



    <!-- table -->
    <div class="reports-alert"></div>
    <div class="table-responsive">
     <table class="table table-bordered booking-table table-centered mb-0">
      <thead>
       <tr>
        <th>#</th>
        <th>Service price</th>
        <th>Service title</th>
        <th>quantity</th>
       </tr>
      </thead>
      <tbody>
       <?php foreach ($booking_report as $report) { ?>
        <tr>
         <td><?= html_escape($report['id']) ?></td>
         <td><?= html_escape($report['service_price'])  ?></td>
         <td><?= html_escape($report['service_title'])  ?></td>
         <td><?= html_escape($report['quantity'])  ?></td>
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