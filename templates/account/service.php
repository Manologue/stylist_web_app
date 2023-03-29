<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page service-page">
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
         <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
         <li class="breadcrumb-item active">Create Category</li>
        </ol>
       </div> -->
       <h4 class="page-title">Create Service</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->
    <!-- success alert -->

    <form class="form-category" method="POST" action="<?= DOC_ROOT ?>account/service/<?= $identifier ?>/<?= $service['id'] ?>" enctype="multipart/form-data">
     <div class="row d-flex justify-content-center">
      <div class="col-8">
       <small><?= $errors['warning'] ?></small>
       <div class="card">
        <div class="card-body">
         <div class="row">
          <div class="col-xl-12">
           <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <input type="text" id="category_id" readonly value="<?= html_escape($category['title']) ?>" class="form-control" placeholder="Enter title">
            <input type="hidden" id="category_id" name="category_id" value="<?= html_escape($category['id']) ?>" class="form-control" placeholder="Enter title">
           </div>
           <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" type="text" id="title" name="title" value="<?= html_escape($service['title']) ?>" class="form-control" placeholder="Enter title">
            <small><?= $errors['title'] ?></small>
           </div>

           <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Enter some brief description.."><?= html_escape($service['description']) ?></textarea>
            <small><?= $errors["description"] ?></small>
           </div>

           <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input class="form-control" min=1 type="number" name="price" id="price" value="<?= html_escape($service['price']) ?>">
            <small><?= $errors["price"] ?></small>
           </div>

           <br>
           <button type="submit" name="save" class="btn btn-info">Save</button>
          </div> <!-- end col-->
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