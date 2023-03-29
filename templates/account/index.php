<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page">
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
        <form class="d-flex">
         <div class="input-group">
          <input type="text" class="form-control form-control-light" id="dash-daterange">
          <span class="input-group-text bg-primary border-primary text-white">
           <i class="mdi mdi-calendar-range font-13"></i>
          </span>
         </div>
         <a href="javascript: void(0);" class="btn btn-primary ms-2">
          <i class="mdi mdi-autorenew"></i>
         </a>
         <a href="javascript: void(0);" class="btn btn-primary ms-1">
          <i class="mdi mdi-filter-variant"></i>
         </a>
        </form>
       </div>
       <h4 class="page-title">Dashboard</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->
    <?php if ($published) { ?>
     <div class="row">
      <div class="col-12">
       <div class="card border-success border">
        <div class="card-body">
         <h5 class="card-title text-success">You are officially published as a member of the site</h5>
        </div> <!-- end card-body-->
       </div> <!-- end card-->
      </div> <!-- end col-->
     </div>

    <?php } else { ?>
     <div class="row">
      <div class="col-12">
       <div class="card border-danger border">
        <div class="card-body">
         <h5 class="card-title text-danger">important!!</h5>
         <p class="card-text text-danger">In order to be published as a stylist you need to fill your settings correctly</p>
         <p class="card-text text-danger">make sure to fill the following</p>
         <ul class="card-text text-danger">
          <?php if (!$services) { ?> <li>your services</li> <?php } ?>
          <?php if (!$availability) { ?> <li>your availability(day and time)</li> <?php } ?>
          <?php if (!$user['city_of_work']) { ?> <li>your service area</li> <?php } ?>
          <?php if (!$user['price_starter']) { ?> <li>your price starter (in section profile)</li> <?php } ?>
          <?php if (!$user['years_exp']) { ?> <li>your year(s) of experience (in section profile)</li> <?php } ?>

         </ul>
        </div> <!-- end card-body-->
       </div> <!-- end card-->
      </div> <!-- end col-->
     </div>
    <?php } ?>

    <?php if (($user['picture'] == "empty-profile.png" || $user['picture'] == "") || !$gallery) { ?>
     <div class="row">
      <div class="col-12">
       <div class="card border-warning border">
        <div class="card-body">
         <h5 class="card-title text-warning">Optional</h5>
         <p class="card-text text-warning">To boost your profile in order to attract more customers</p>
         <p class="card-text text-warning">make sure to fill the following</p>
         <ul class="card-text text-warning">
          <?php if ($user['picture'] == "empty-profile.png" || $user['picture'] == "") { ?> <li>profile picture (in section profile)</li> <?php } ?>
          <?php if (!$gallery) { ?> <li>your gallery photos of your work (in section gallery)</li> <?php } ?>
         </ul>
        </div> <!-- end card-body-->
       </div> <!-- end card-->
      </div> <!-- end col-->
     </div>
    <?php } ?>

    <div class="row">
     <div class="col-6">
      <div class="card border-secondary border">
       <div class="card-body">
        <h5 class="card-title">Edit your services</h5>
        <a href="<?= DOC_ROOT ?>account/services">Services</a>
       </div> <!-- end card-body-->
      </div> <!-- end card-->
     </div> <!-- end col-->
     <div class="col-6">
      <div class="card border-secondary border">
       <div class="card-body">
        <h5 class="card-title">Enter your availability</h5>
        <a href="<?= DOC_ROOT ?>account/availability">Availability</a>
       </div> <!-- end card-body-->
      </div> <!-- end card-->
     </div> <!-- end col-->
     <div class="col-6">
      <div class="card border-secondary border">
       <div class="card-body">
        <h5 class="card-title">Define your work area</h5>
        <a href="<?= DOC_ROOT ?>account/service_location">Service Area</a>
       </div> <!-- end card-body-->
      </div> <!-- end card-->
     </div> <!-- end col-->
     <div class="col-6">
      <div class="card border-secondary border">
       <div class="card-body">
        <h5 class="card-title">Edit your bio, years of experience...</h5>
        <a href="<?= DOC_ROOT ?>account/profile">Profile</a>
       </div> <!-- end card-body-->
      </div> <!-- end card-->
     </div> <!-- end col-->
     <div class="col-6">
      <div class="card border-secondary border">
       <div class="card-body">
        <h5 class="card-title">Change your password</h5>
        <a href="<?= DOC_ROOT ?>account/password">Password</a>
       </div> <!-- end card-body-->
      </div> <!-- end card-->
     </div> <!-- end col-->
     <div class="col-6">
      <div class="card border-secondary border">
       <div class="card-body">
        <h5 class="card-title">Edit your identity</h5>
        <a href="<?= DOC_ROOT ?>account/identity">Itendity</a>
       </div> <!-- end card-body-->
      </div> <!-- end card-->
     </div> <!-- end col-->
     <div class="col-6">
      <div class="card border-secondary border">
       <div class="card-body">
        <h5 class="card-title">upload photos of your work</h5>
        <a href="<?= DOC_ROOT ?>account/gallery">Gallery</a>
       </div> <!-- end card-body-->
      </div> <!-- end card-->
     </div> <!-- end col-->
    </div>



   </div>
   <!-- container -->

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
<?php
// include("includes/end-bar.php")
?>
<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<?php include("includes/footer.php") ?>