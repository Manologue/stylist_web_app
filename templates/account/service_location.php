<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page service-location-page">
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
       <div class="page-title-right">
        <!-- <ol class="breadcrumb m-0">
         <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
         <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
         <li class="breadcrumb-item active">Create Category</li>
        </ol> -->
       </div>
       <h4 class="page-title">Pofile</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->


    <div class="col-sm-12 d-flex justify-content-center">

     <div class="container col-md-6">
      <!-- success alert -->
      <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
      <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
      <?php if ($city_of_work == "") { ?>
       <div class="alert text-danger service-location-alert">Please you have not yet selected the location in which you want to offer your services</div>
      <?php } ?>
      <form class="service_location_form" action="<?= DOC_ROOT ?>account/service_location" method="POST">

       <label for="service_loaction" class="form-label">Service Location</label>
       <input class="form-control" type="text" name="city_of_work" value="<?= html_escape($city_of_work) ?>" id="city_of_work">
       <input class="form-control" type="hidden" name="city" id="city">
       <input class="form-control" type="hidden" name="state" id="state">
       <br>
      </form>
      <button class="btn service-location-btn btn-warning">submit</button>


      <ul class="list-group">
       <!-- <li class="list-group-item"><i class="uil-location-point"></i> Google Drive</li>
       <li class="list-group-item"><i class="uil-location-point"></i> Facebook Messenger</li>
       <li class="list-group-item"><i class="uil-location-point"></i> Apple Technology Company</li>
       <li class="list-group-item"><i class="uil-location-point"></i> Intercom Support System</li>
       <li class="list-group-item"><i class="uil-location-point"></i> Paypal Payment Gateway</li> -->
      </ul>
     </div>


    </div> <!-- end col-->


    <!-- end row-->


   </div> <!-- container -->


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