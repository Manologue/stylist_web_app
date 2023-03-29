<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page services-page">
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
         <li class="breadcrumb-item"><a href="javascript: void(0);"><?= html_escape($category['title']) ?></a></li>
         <li class="breadcrumb-item active">Services</li>
        </ol>
       </div>
       <h4 class="page-title">Services</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->
    <br>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-modal">+ Add Service</button>
    <br>
    <br>






    <div class="tab-pane show active" id="modal-pages-preview">
     <!-- Signup modal content -->
     <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">

        <div class="modal-body">
         <div class="text-center mt-2 mb-4">
          <a href="index.html" class="text-success">
           <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
          </a>
         </div>

         <form novalidate class="ps-3 pe-3" action="">

          <div class="mb-3">
           <label for="title" class="form-label">Title</label>
           <input class="form-control" type="text" name="title" required>
           <div class="invalid-feedback">title is required</div>
          </div>

          <div class="mb-3">
           <label for="price" class="form-label">Price</label>
           <input class="form-control" type="number" name="price" required>
           <div class="invalid-feedback">price is required</div>
          </div>

          <div class="mb-3">
           <label for="description" class="form-label">Description</label>
           <textarea class="form-control" name="description" required cols="30" rows="10"></textarea>
           <div class="invalid-feedback">description is required</div>
          </div>

          <div class="mb-3 text-center">
           <button class="btn btn-primary" id="add-btn" type="submit">Add Service</button>
          </div>

         </form>

        </div>
       </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->


     <!-- SignIn modal content -->
     <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-body">
         <div class="text-center mt-2 mb-4">
          <a href="index.html" class="text-success">
           <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
          </a>
         </div>

         <form novalidate action="" class="ps-3 pe-3">
          <div class="mb-3">
           <label for="title" class="form-label">Title</label>
           <input class="form-control" name="title" type="text" id="title" required="">
           <div class="invalid-feedback">title is required</div>
          </div>

          <div class="mb-3">
           <label for="price" class="form-label">Price</label>
           <input class="form-control" name="price" type="number" required="" id="price">
           <div class="invalid-feedback">price is required</div>
          </div>

          <div class="mb-3">
           <label for="description" class="form-label">Description</label>
           <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
           <div class="invalid-feedback">description is required</div>
          </div>

          <input type="hidden" name="id" id="id">

          <div class="mb-3 text-center">
           <button class="btn btn-primary" id="edit-btn" type="submit">Update Service</button>
          </div>
         </form>
        </div>
       </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

     <div class="button-list">
      <!-- Sign Up modal -->
      <!-- <button `type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signup-modal" `>Sign Up Modal</button> -->
      <!-- Log In modal -->
      <!-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#login-modal">Log In Modal</button> -->
     </div>
    </div> <!-- end preview-->


    <!-- table -->
    <div class="services-alert"></div>
    <div class="table-responsive">
     <table class="table table-bordered services-table table-centered  mb-0">
      <thead>
       <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Price</th>
        <th>Description</th>
        <th class="text-center">Action</th>
       </tr>
      </thead>
      <tbody data-category_id=<?= html_escape($category['id']) ?>>
       <!-- ajax  -->
      </tbody>
     </table>
    </div>
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