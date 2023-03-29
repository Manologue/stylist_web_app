<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page password-page">
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
       <h4 class="page-title">Update Password</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->


    <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
    <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
    <?php if ($errors['warning'] !== '') { ?><div class="alert alert-danger"><?= $errors['warning'] ?></div><?php } ?>


    <form class="form-profile" method="POST" action="<?= DOC_ROOT ?>admin/password" enctype="multipart/form-data">
     <div class="row d-flex align-items-center justify-content-center">
      <div class="col-sm-12 col-md-6">
       <div class="card">
        <div class="card-body">
         <div class="row">
          <div class="col-xl-12">
           <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" id="password" name="password" class="form-control">
            <small><?= $errors['password'] ?></small>
           </div>
           <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
            <small><?= $errors['confirm_password'] ?></small>
           </div>
           <button type="submit" name="update" class="btn btn-info">Update</button>
          </div> <!-- end col-->
         </div>
         <!-- end row -->
        </div> <!-- end card-body -->
       </div> <!-- end card-->
      </div> <!-- end col-->

     </div>
     <!-- end row-->
    </form>


   </div>









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