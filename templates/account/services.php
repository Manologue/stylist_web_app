<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
  <!-- ========== Left Sidebar Start ========== -->
  <?php include("includes/left-sidebar.php") ?>
  <!-- Left Sidebar End -->

  <!-- ============================================================== -->
  <!-- Start Page Content here -->
  <!-- ============================================================== -->

  <div class="content-page account-services-page">
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

        <div class="accordion custom-accordion" id="custom-accordion-one">
          <?php if ($success) { ?><div class="alert alert-success"><?= $success ?></div><?php } ?>
          <?php if ($failure) { ?><div class="alert alert-danger"><?= $failure ?></div><?php } ?>
          <?php
          $i = 0;
          $j = 0;
          foreach ($categories as $category) {
          ?>
            <div class="card mb-0">
              <div class="card-header" id="heading">
                <h5 class="m-0">
                  <div class="custom-accordion-title d-block py-1 d-flex justify-content-between align-items-center">
                    <span><?= $category['title'] ?></span> <a href="<?= DOC_ROOT ?>account/category/<?= $category['id'] ?>" class="btn btn-warning">+ add service</a>
                  </div>
                </h5>
              </div>
              <?php
              if ($services[$i]) {
                foreach ($services[$i] as $service) {
              ?>
                  <div id="collapseFour" class="collapse show">
                    <div class="card-body d-flex justify-content-between">
                      <div class="details">
                        <span><?= $service['service'] ?></span>
                        <p><?= $service['description'] ?></p>
                      </div>
                      <div class="action d-flex align-items-center flex-md-column">
                        <span><?= $service['price'] ?>$</span>
                        <div>
                          <form method="POST" action="<?= DOC_ROOT ?>account/delete_service" class="btn btn-danger delete-form">
                            <input type="hidden" name="service_id" value=<?= $service['id'] ?>>
                            <input type="hidden" name="category_id" value=<?= $service['category_id'] ?>>
                            <input type="hidden" name="user_id" value=<?= $service['user_id'] ?>>
                            <button data-bs-toggle="modal" data-bs-target='#info-alert-modal<?= $j ?>' name="delete" type="submit"><i class="mdi mdi-delete"></i></button>
                          </form>
                          <a href="<?= DOC_ROOT ?>account/edit_service/<?= $service['id'] ?>" class="btn btn-warning">
                            <i class="mdi mdi-pencil"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <!-- Info Alert Modal -->

                    <div id="info-alert-modal<?= $j ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-body p-4">
                            <div class="text-center">
                              <h4 class="mt-2">are you sure you want to delete this!</h4>
                              <button type="button" class="btn delete-service-btn btn-danger my-2" data-bs-dismiss="modal">yes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.modal -->
                  </div>
              <?php
                  $j++;
                }
              } ?>
            </div>
          <?php
            $i++;
          } ?>

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