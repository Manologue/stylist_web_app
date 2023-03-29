<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page edit-booking-page">
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
       <h4 class="page-title">Edit Booking with Stylists of State <?= html_escape($user['state']) ?></h4>
      </div>
     </div>
    </div>
    <!-- end page title -->





    <form class="form-profile" method="POST" action="<?= DOC_ROOT ?>admin/edit_booking/<?= $identifier ?>" enctype="multipart/form-data">
     <div class="row d-flex align-items-center justify-content-center">
      <div class="col-sm-12 col-md-6">
       <div class="card">
        <div class="card-body">
         <div class="row">
          <div class="col-xl-12">
           <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" class="form-control">
             <option value="<?= html_escape($user['id']) ?>"><?= html_escape($user['first_name']) ?> <?= html_escape($user['name']) ?> ------ <?= html_escape($user['city_of_work']) ?></option>
             <?php foreach ($users as $user) { ?>
              <option value="<?= html_escape($user['id']) ?>"><?= html_escape($user['first_name']) ?> <?= html_escape($user['name']) ?> ------ <?= html_escape($user['city_of_work']) ?></option>
             <?php } ?>
            </select>
           </div>

           <button type="submit" name="submit" class="btn btn-info">submit</button>
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