<div class="services stylist-div">
 <h5>My services</h5>
 <div class="container">
  <!-- single article -->
  <?php
  // echo '<pre>';
  // var_dump($categories);
  // echo '</pre>';

  ?>
  <?php if (isset($categories)) { ?>
   <?php foreach ($categories as $category => $services) { ?>

    <article>
     <div class="service service-div">
      <span><?= html_escape($category) ?></span>
      <div class="icons">
       <i class="fa-solid fa-chevron-down"></i>
      </div>
     </div>
     <div class="products">
      <!-- single product service -->
      <?php foreach ($services as $service) { ?>
       <div class="single-product service-div">
        <span><?= html_escape($service['service']) ?></span>
        <p>
         <?= html_escape($service['description']) ?>
        </p>
        <div>
         <span class="price"> <?= html_escape($service['price']) ?>$</span>
         <form id="add-service-form">
          <input type="hidden" name="service_id" value="<?= html_escape($service['id']) ?>">
          <input type="hidden" name="user_id" value="<?= html_escape($user['id']) ?>">
          <input type="hidden" name="service_price" value="<?= html_escape($service['price']) ?>">
          <input type="hidden" name="service_title" value="<?= html_escape($service['service']) ?>">
          <?php if ($cart_page === 'stylist') { ?>
           <button id="add-btn" type="submit" class="btn cart-btn">add</button>
          <?php } ?>
         </form>
        </div>
       </div>
      <?php } ?>
      <!-- end of single product service -->
     </div>
    </article>
   <?php } ?>
  <?php } else { ?>
   <p>no services to offer</p>
  <?php } ?>
  <!--end of single article -->
 </div>
</div>