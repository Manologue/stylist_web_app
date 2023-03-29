<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page gallery-page">
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
       <h4 class="page-title">Gallery</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->


    <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
    <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
    <?php if ($partial) { ?><div class="alert alert-warning"><?= $partial ?></div><?php } ?>



    <form action="<?= DOC_ROOT ?>account/gallery" method="POST" enctype="multipart/form-data">
     <label for="file" class="form-label" class="form-control">Images</label>
     <input type="file" name="files[]" class="form-control" multiple>
     <br>
     <button type="submit" name="upload">Upload files</button>
    </form>

    <small>
     <?php if ($errors['files']) { ?>
      <ul>
       <?php foreach ($errors['files'] as $k => $v) { ?>
        <?php if ($v) { ?>
         <li><?= $v ?></li>
        <?php } ?>
       <?php } ?>
      </ul>
     <?php } ?>
    </small>


    <br>
    <br>
    <div class="row">
     <div class="col-12">
      <div class="row row-cols-1 row-cols-md-3 g-3">
       <?php foreach ($user_gallery as $gallery) { ?>
        <div class="col">
         <div class="card">
          <img src="<?= DOC_ROOT ?>uploads/<?= $gallery['image'] ?>" class="card-img-top" alt="Card image cap">
          <div class="card-body">
           <a href="<?= DOC_ROOT ?>account/delete_image_gallery/<?= $gallery['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete"><i class="mdi mdi-delete"></i></a>
          </div>
         </div>
        </div>
       <?php } ?>
      </div>
     </div> <!-- end col-->
    </div>
    <!-- end row -->





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