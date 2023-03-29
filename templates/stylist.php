<?php include('includes/header.php') ?>

<!------------------------------ HOME PAGE ----------------------->
<main id="stylist-page">
   <div class="section-center">
      <!-- alert -->
      <?php if ($failure) { ?>
         <div class="alert alert-danger">
            <?= $failure ?>
         </div>
      <?php } ?>
      <?php include('includes/alert-cart.php') ?>
      <!-- end of alert -->

      <!-- this divider class wass added for css purpose -->
      <div class="divider">
         <!-- cart -->
         <?php include('includes/cart.php') ?>
         <!-- end of cart -->
         <!--************** stylist section  ****************-->
         <section class="section stylist">
            <div class="stylist-center">
               <!-- pofile section  -->
               <?php include('includes/stylist/profile.php') ?>
               <!-- end of profile section -->
               <!-- services -->
               <?php include('includes/stylist/services.php') ?>
               <!-- end of services -->
               <!-- gallery -->
               <?php include('includes/stylist/gallery.php') ?>
               <!-- end of gallery -->
               <!-- comments -->
               <?php
               // include('includes/stylist/comments.php')
               ?>
               <!-- end of comments -->
            </div>
         </section>
      </div>

   </div>
   <!-- ************************** modals ************************ -->
   <?php include('includes/modals.php') ?>
</main>
<!------------------------------END OF HOME PAGE  ----------------------------->
<?php include('includes/footer.php') ?>