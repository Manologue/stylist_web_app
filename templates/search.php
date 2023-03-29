<?php include('includes/header.php') ?>

<!------------------------------ HOME PAGE ----------------------->
<main id="search-page">
 <!-- home -->
 <?php include('includes/search/home.php') ?>
 <!-- end of home -->
 <section class="section results">
  <div class="section-center">
   <h4>Result obtained: <?= html_escape($count) ?></h4>
   <?php include('includes/results_stylist.php') ?>
  </div>
 </section>
 <!-- ************************** modals ************************ -->
 <?php include('includes/modals.php') ?>
 <!-- end of home -->
</main>
<!------------------------------END OF HOME PAGE  ----------------------------->
<?php include('includes/footer.php') ?>