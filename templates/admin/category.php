<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page category-page">
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
        <ol class="breadcrumb m-0">
         <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
         <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
         <li class="breadcrumb-item active">Create Category</li>
        </ol>
       </div>
       <h4 class="page-title">Create Category</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->
    <!-- success alert -->
    <div class="alert category-alert"></div>

    <form class="form-category" method="POST" action="<?= DOC_ROOT ?>admin/category/<?= $identifier ?>" enctype="multipart/form-data">
     <div class="row">
      <div class="col-12">
       <div class="card">
        <div class="card-body">
         <div class="row">
          <div class="col-xl-6">
           <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" value="<?= html_escape($category['title']) ?>" class="form-control" placeholder="Enter title">
            <small><?= $errors['title'] ?></small>
           </div>

           <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter some brief description.."><?= html_escape($category['description']) ?></textarea>
            <small><?= $errors["description"] ?></small>
           </div>

           <div class="mb-3">
            <input type="checkbox" value="1" name="published" id="published" <?= ($category['published'] == 1) ? 'checked' : '' ?>>
            <label for="published" class="form-label">published</label>
           </div>

          </div> <!-- end col-->

          <div class="col-xl-6">
           <div class="mb-3 mt-3 mt-xl-0">
            <input type="file" accept="image/*" name="image" id="category-file" style="display: none;">
            <label for="category-file" style="cursor: pointer;">Upload Image <i class="dripicons-cloud-upload"></i></label>
            <!-- end file preview template -->
           </div>
           <p class="filename-container"></p>
           <div class="img-container-category">
            <img id="output" src="<?= DOC_ROOT ?>uploads/<?= html_escape($category['image']) ?>" alt="<?= html_escape($category['image']) ?>">
            <i class="dripicons-cross"></i>
           </div>
           <small><?= $errors['image'] ?></small>

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