<section id="cart" class="section cart">
 <div class="cart-center stylist-div">
  <div class="cart-container">
   <p class="title">An appointment with:</p>
   <div class="booking">
    <div class="head">
     <div class="img-container">
      <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($user['picture']) ?>" alt="<?= html_escape($user['picture']) ?>" />
      <span><?= html_escape($user['first_name']) ?></span>
     </div>
     <span class="total-cart-amount">
      <!--******** ajax *********-->
     </span>
    </div>
   </div>
   <div class="destination">
    <div class="head">
     <span><i class="fa-solid fa-location-dot"></i>Destination</span>
     <?php if ($cart_page !== "success") { ?>
      <a id="destination-btn" href="#">Edit</a>
     <?php } ?>
    </div>
    <div class="info">
     <p>

     </p>
    </div>
    <!-- <div class="info empty">
     <p>veillez ajouter votre address</p>
    </div> -->
   </div>
   <div class="services-cart">
    <div class="head">
     <span><i class="fa-solid fa-cart-shopping"></i>Services Selected</span>
     <?php if ($cart_page !== "stylist" && $cart_page !== "success") { ?>
      <a id="" href="<?= DOC_ROOT ?>stylist/<?= html_escape($user['url_address']) ?>">Edit</a>
     <?php } ?>
    </div>
    <div class="services-container" data-user_id=<?= html_escape($user['id']) ?> data-services_count=<?= html_escape(($_SESSION["count_services_{$user['id']}"]) ?? 0) ?>>
     <!--********** ajax  **********-->

    </div>
   </div>
   <?php if ($cart_page === 'authenticate' || $cart_page === 'success') { ?>
    <div class="date-time">
     <div class="head">
      <span><i class="fa-regular fa-clock"></i> Date & Time</span>
      <?php if ($cart_page !== "success") { ?>
       <a id="" href="<?= DOC_ROOT ?>stylist/<?= html_escape($user['url_address']) ?>/cart/select-datetime">Edit</a>
      <?php } ?>
     </div>
     <div class="info">
      <p>
       <?= isset($_SESSION["valid_date_time_{$user['id']}"]) ? $format_date . ' at ' . $format_time  : "" ?>
      </p>
     </div>
    </div>
   <?php } ?>
  </div>
  <!-- handle with javascript in modals.js check the if cartForm condition -->
  <?php if ($cart_page === "stylist") { ?>
   <form method="POST" action="<?= DOC_ROOT ?>stylist/<?= html_escape($user['url_address']) ?>/cart/select-datetime">
    <button class="btn cart-btn">fix an appointment</button>
    <input type="hidden" value="true" name="valid" />
   </form>
  <?php } ?>
 </div>
</section>