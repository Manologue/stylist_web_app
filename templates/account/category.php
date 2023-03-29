<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page services-category-page">
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
       <h4 class="page-title">Services</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->


    <div class="row">
     <div class="col-md-12">
      <!-- Portlet card -->
      <div class="card mb-md-0 mb-3">
       <div class="card-body">
        <h5 class="card-title mb-0"><?= $category['title'] ?></h5>
        <br>
        <h3 class="card-title mb-0">Add a service</h3>
        <br>
        <br>
        <?php if ($services) { ?>
         <p>Save time and use one of our service templates. Select a template and customize the settings, description, price if needed :</p>
         <div id="cardCollpase1" class="collapse pt-3 show">
          <div class="accordion custom-accordion" id="custom-accordion-one">
           <?php foreach ($services as $service) { ?>
            <div class="card mb-0">
             <div class="card-header" id="heading">
              <h5 class="m-0">
               <div class="custom-accordion-title d-block py-1 d-flex justify-content-between align-items-center">
                <span><i class="uil-newspaper"></i> <?= $service['title'] ?></span> <a href="<?= DOC_ROOT ?>account/service/<?= $category['id'] ?>/<?= $service['id'] ?>">Select</a>
               </div>
              </h5>
             </div>
            </div>
           <?php  } ?>
          </div>
          <br>
          <br>
          <p>Or create your own service from scratch :</p>
         <?php } ?>
         <div class="accordion custom-accordion" id="custom-accordion-one">
          <div class="card mb-0">
           <div class="card-header" id="heading">
            <h5 class="m-0">
             <div class="custom-accordion-title d-block py-1 d-flex justify-content-between align-items-center">
              <span><i class="uil-file-plus"></i> Your own service</span> <a href="<?= DOC_ROOT ?>account/service/<?= $category['id'] ?>">Create</a>
             </div>
            </h5>
           </div>
          </div>
         </div>
         </div>
       </div>
      </div> <!-- end card-->
     </div><!-- end col -->
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