<?php include('includes/header.php') ?>

<!------------------------------ HOME PAGE ----------------------->
<main id="services-page">
 <!-- home  -->
 <?php include('includes/hairdressing/home.php') ?>
 <!-- end of home -->

 <section class="section intro-desc">
  <div class="section-center intro-desc-center">
   <h4>Find our best hairdressers for <?= $category['title'] ?></h4>
   <p>
    <?= $category['description'] ?>
   </p>
  </div>
 </section>
 <section class="section results">
  <div class="section-center">
   <?php include('includes/results_stylist.php') ?>
  </div>
 </section>
 <!-- blog  -->
 <?php
 // include('includes/hairdressing/blog.php') 
 ?>
 <!-- end of blog -->
 <!-- ************************** modals ************************ -->
 <?php include('includes/modals.php') ?>

</main>
<!------------------------------END OF HOME PAGE  ----------------------------->
<?php include('includes/footer.php') ?>