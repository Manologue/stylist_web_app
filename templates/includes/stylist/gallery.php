<?php if (!empty($gallery)) { ?>
 <div class="gallery stylist-div">
  <h5>Photos</h5>
  <div class="main-carousel">
   <?php foreach ($gallery as $photo) { ?>
    <div class="carousel-cell">
     <img src="<?= DOC_ROOT ?>uploads/<?= $photo['image'] ?>" alt="" />
    </div>
   <?php  }  ?>
  </div>
 </div>
<?php } ?>