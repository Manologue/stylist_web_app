<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page availability-page">
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
       <h4 class="page-title">Availability</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->

    <div class="accordion custom-accordion" id="custom-accordion-one">
     <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
     <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
     <?php
     $i = 0;
     $j = 0;
     foreach ($days as $day) {
     ?>
      <div class="card mb-0">
       <div class="card-header" id="heading">
        <h5 class="m-0">
         <div class="custom-accordion-title d-block py-1 d-flex justify-content-between align-items-center">
          <span><?= $day['name'] ?></span> <?php if (!$times[$i]) { ?><a href="<?= DOC_ROOT ?>account/day_time/<?= $day['id'] ?>" class="btn btn-warning">+ add date-time</a> <?php } ?>
         </div>
        </h5>
       </div>
       <?php
       if ($times[$i]) {
        foreach ($times[$i] as $time) {
       ?>
         <div id="collapseFour" class="collapse show">
          <div class="card-body d-flex justify-content-between">
           <div class="details">
            <span><?= $time['time_range'] ?></span>
           </div>
           <div class="action d-flex align-items-center flex-md-column">
            <div>
             <a href="<?= DOC_ROOT ?>account/delete_time/<?= $time['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
            </div>
           </div>
          </div>
          <!-- Info Alert Modal -->
         </div>
       <?php
        }
       } ?>
      </div>
     <?php
      $i++;
     } ?>

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
<?php include("includes/end-bar.php") ?>
<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<?php include("includes/footer.php") ?>