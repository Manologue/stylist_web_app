<?php include('includes/header.php') ?>



<!------------------------------ HOME PAGE ----------------------->
<main id="datetime-page">
 <div class="section-center">
  <!-- alert -->
  <?php include('includes/alert-cart.php') ?>
  <!-- end of alert -->

  <br>
  <br>
  <h5 class="title">choose date & time</h5>
  <br>
  <br>
  <!-- calendar -->

  <div class="container">

   <div class="calendar-container">

    <!-- calendar placeholder coming from ajax jquery -->
    <div id="picker"></div>

    <!-- displaying date chosen -->
    <p>Selected date: <span id="selected-date"></span></p>
    <p>Selected time: <span id="selected-time"></span></p>

    <!-- date time form -->
    <form method="POST" action="<?= DOC_ROOT ?>stylist/<?= html_escape($user['url_address']) ?>/cart/authenticate">
     <input type="hidden" value="true" name="valid" />
    </form>
   </div>
   <!-- end of calendar -->

   <!-- cart  -->
   <?php include('includes/cart.php') ?>
   <!-- end of cart -->
  </div>

 </div>

 <!-- ************************** modals ************************ -->
 <?php include('includes/modals.php') ?>
</main>

<?php include('includes/footer.php') ?>