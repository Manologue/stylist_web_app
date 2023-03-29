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
    <!-- success alert -->
    <div class="alert profile-alert"></div>
    <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
    <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
    <form class="form-profile" method="POST" action="<?= DOC_ROOT ?>account/profile" enctype="multipart/form-data">
     <small><?= $errors["warning"] ?></small>
     <div class="row">
      <div class="col-12">
       <div class="card">
        <div class="card-body">
         <div class="row">
          <div class="col-xl-6">
           <div class="mb-3">
            <label for="description" class="form-label">Bio</label>
            <textarea class="form-control" name="bio" id="bio" rows="5"><?= html_escape($profile['bio']) ?></textarea>
            <small><?= $errors["bio"] ?></small>
           </div>
           <div class="mb-3">
            <label for="years_exp" class="form-label">Years of experience</label>
            <input class="form-control" type="number" name="years_exp" id="years_exp" value="<?= html_escape($profile['years_exp']) ?>">
            <small><?= $errors["years_exp"] ?></small>
           </div>
           <div class="mb-3">
            <label for="price_starter" class="form-label">Price Starter</label>
            <input class="form-control" type="number" name="price_starter" id="price_starter" value="<?= html_escape($profile['price_starter']) ?>">
            <small><?= $errors["price_starter"] ?></small>
           </div>

          </div> <!-- end col-->

          <div class="col-xl-6">
           <div class="mb-3 mt-3 mt-xl-0">
            <input type="file" accept="image/*" name="picture" id="profile-file" style="display: none;">
            <label for="profile-file" style="cursor: pointer;">Upload Image <i class="dripicons-cloud-upload"></i></label>
            <!-- end file preview template -->
           </div>
           <p class="filename-container"></p>
           <div class="img-container-profile">
            <img id="output" src="<?= DOC_ROOT ?>uploads/<?= html_escape($profile['picture']) ?>" alt="<?= html_escape($profile['picture']) ?>">
            <i class="dripicons-cross"></i>
           </div>
           <small><?= $errors['picture'] ?></small>
           <br>
           <br>
          </div> <!-- end col-->


          <!-- end of col -->

          <div class="col-xl-6">
           <button type="submit" name="save" class="btn btn-info">Save</button>
          </div>
          <br>
         </div>
         <!-- end row -->
        </div> <!-- end card-body -->
       </div> <!-- end card-->
      </div> <!-- end col-->

     </div>
     <!-- end row-->
    </form>

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