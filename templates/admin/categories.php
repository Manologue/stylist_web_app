<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page categories-page">
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
         <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
         <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
         <li class="breadcrumb-item active">Categories</li>
        </ol>
       </div> -->
       <h4 class="page-title">Categories</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->
    <br>
    <a href="<?= DOC_ROOT ?>admin/category" class="btn btn-info">+ Add Category</a>
    <br>
    <br>
    <div class="row">
     <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
     <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
     <div class="alert categories-alert"></div>
     <!-- col -->
     <?php foreach ($categories as $category) { ?>
      <div class="col-md-6 col-lg-3">
       <!-- Simple card -->
       <div class="card d-block">
        <a href="<?= DOC_ROOT ?>admin/category/<?= html_escape($category['id']) ?>">
         <img class="card-img-top" src="<?= DOC_ROOT ?>uploads/<?= html_escape($category['image']) ?>" alt="<?= html_escape($category['seo_title']) ?>">
        </a>
        <div class="card-body">
         <h5 class="card-title"><?= html_escape($category['title']) ?></h5>
         <p class="card-text"><?= html_escape($category['description']) ?></p>
         <div class="d-flex justify-content-between">
          <a href="<?= DOC_ROOT ?>admin/services/<?= html_escape($category['id']) ?>" class="card-link text-custom">Services</a>
          <div class="action-container">
           <a class="edit-category-btn" href="<?= DOC_ROOT ?>admin/category/<?= html_escape($category['id']) ?>"><i class=" uil-edit"></i></a>
           <form class="category-delete-form" method="POST" action="<?= APP_ROOT ?>">
            <input type="hidden" name="category_id" value=<?= html_escape($category['id']) ?>>
            <button type="submit" name="delete_category" class="delete-category-btn" data-bs-toggle="modal" data-bs-target="#info-alert-modal"><i class="mdi mdi-delete"></i></button>
           </form>
          </div>
         </div>
        </div> <!-- end card-body-->
       </div> <!-- end card-->
      </div><!-- end col -->
     <?php } ?>
     <!-- end row -->
    </div>
    <!-- container -->




    <!-- Info Alert Modal -->
    <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-sm">
      <div class="modal-content">
       <div class="modal-body p-4">
        <div class="text-center">
         <h4 class="mt-2">are you sure you want to delete this!</h4>
         <button type="button" class="btn btn-danger my-2" data-bs-dismiss="modal">yes</button>
        </div>
       </div>
      </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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