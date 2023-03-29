<?php include('includes/header.php') ?>

<!------------------------------ HOME PAGE ----------------------->
<main id="stylist-page">


 <div class="section-center">

  <!--************** stylist section  ****************-->
  <section class="section stylist stylist-profile-page-services" data-id=<?= html_escape($user['id']) ?>>
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
  <!-- calendar -->
  <div class="calendar-container">

   <!-- calendar placeholder coming from ajax jquery -->
   <div id="picker"></div>


  </div>

 </div>


</main>
<!------------------------------END OF HOME PAGE  ----------------------------->
<?php include('includes/footer.php') ?>