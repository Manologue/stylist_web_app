<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page profile-page">
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
       <h4 class="page-title">Profile</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->


    <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
    <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
    <?php if ($errors['warning'] !== '') { ?><div class="alert alert-danger"><?= $errors['warning'] ?></div><?php } ?>


    <form class="form-profile" method="POST" action="<?= DOC_ROOT ?>admin/profile" enctype="multipart/form-data">
     <div class="row">
      <div class="col-12">
       <div class="card">
        <div class="card-body">
         <div class="row">
          <div class="col-xl-12">
           <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" value="<?= html_escape($user['email']) ?>" class="form-control">
            <small><?= $errors['email'] ?></small>
           </div>

           <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" name="name" id="name" value="<?= html_escape($user['name']) ?>" class="form-control" />
            <small><?= $errors["name"] ?></small>
           </div>

           <div class="mb-3">
            <label for="first_name" class="form-label">First name</label>
            <input class="form-control" name="first_name" id="first_name" value="<?= html_escape($user['first_name']) ?>" class="form-control" />
            <small><?= $errors["first_name"] ?></small>
           </div>

           <div class="mb-3">
            <label for="adresss" class="form-label">Address</label>
            <input class="form-control" name="adress" id="adress" value="<?= html_escape($user['adress']) ?>" class="form-control" />
            <small><?= $errors["adress"] ?></small>
           </div>


           <button type="submit" name="update" class="btn btn-info">Save</button>

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