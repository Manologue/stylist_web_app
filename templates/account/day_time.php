<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page day-time-page">
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
       <h4 class="page-title">Select Time range</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->
    <!-- success alert -->

    <form class="form-category" method="POST" action="<?= DOC_ROOT ?>account/day_time/<?= $identifier ?>" enctype="multipart/form-data">
     <div class="row d-flex justify-content-center">
      <div class="col-8">
       <small><?= $errors['warning'] ?></small>
       <div class="card">
        <div class="card-body">
         <div class="row">
          <div class="col-xl-12">
           <div class="mb-3">
            <label for="range_1" class="form-label">Range 1</label>
            <select class="form-control" id="range_1">
             <option value="7:00">7:00</option>
             <option value="7:30">7:30</option>
             <option value="8:00">8:00</option>
             <option value="8:30">8:30</option>
             <option value="9:00">9:00</option>
             <option value="9:30">9:30</option>
             <option value="10:00">10:00</option>
             <option value="10:30">10:30</option>
             <option value="11:00">11:00</option>
             <option value="11:30">11:30</option>
             <option value="12:00">12:00</option>
             <option value="12:30">12:30</option>
             <option value="13:00">13:00</option>
             <option value="13:30">13:30</option>
             <option value="14:00">14:00</option>
             <option value="14:30">14:30</option>
             <option value="15:00">15:00</option>
             <option value="15:30">15:30</option>
             <option value="16:00">16:00</option>
             <option value="16:30">16:30</option>
             <option value="17:00">17:00</option>
             <option value="17:30">17:30</option>
             <option value="18:00">18:00</option>
             <option value="18:30">18:30</option>
             <option value="19:00">19:00</option>
             <option value="19:30">19:30</option>
             <option value="20:00">20:00</option>
             <option value="20:30">20:30</option>
             <option value="21:00">21:00</option>
             <option value="21:30">21:30</option>
             <option value="22:00">22:00</option>
             <option value="22:30">22:30</option>
             <option value="23:00">23:00</option>
             <option value="23:30">23:30</option>
            </select>
           </div>
           <div class="mb-3">
            <label for="range_2" class="form-label">Range 2</label>
            <select class="form-control" id="range_2">
             <option value="7:00">7:00</option>
             <option value="7:30">7:30</option>
             <option value="8:00">8:00</option>
             <option value="8:30">8:30</option>
             <option value="9:00">9:00</option>
             <option value="9:30">9:30</option>
             <option value="10:00">10:00</option>
             <option value="10:30">10:30</option>
             <option value="11:00">11:00</option>
             <option value="11:30">11:30</option>
             <option value="12:00">12:00</option>
             <option value="12:30">12:30</option>
             <option value="13:00">13:00</option>
             <option value="13:30">13:30</option>
             <option value="14:00">14:00</option>
             <option value="14:30">14:30</option>
             <option value="15:00">15:00</option>
             <option value="15:30">15:30</option>
             <option value="16:00">16:00</option>
             <option value="16:30">16:30</option>
             <option value="17:00">17:00</option>
             <option value="17:30">17:30</option>
             <option value="18:00">18:00</option>
             <option value="18:30">18:30</option>
             <option value="19:00">19:00</option>
             <option value="19:30">19:30</option>
             <option value="20:00">20:00</option>
             <option value="20:30">20:30</option>
             <option value="21:00">21:00</option>
             <option value="21:30">21:30</option>
             <option value="22:00">22:00</option>
             <option value="22:30">22:30</option>
             <option value="23:00">23:00</option>
             <option value="23:30">23:30</option>
            </select>
           </div>
           <div class="mb-3">
            <label for="result" class="form-label">Result</label>
            <input type="text" name="time" id="result" class="form-control" readonly>
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