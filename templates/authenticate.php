<?php include('includes/header.php') ?>





<main id="authenticate-page">
  <div class="section-center">

    <h4 class="title">Identify yourself</h4>
    <!-- alert -->
    <?php include('includes/alert-cart.php') ?>
    <!-- end of alert -->
    <div class="container">
      <section class="section">
        <?php if ($errors['warning']) { ?>
          <div class="alert alert-danger"><?= $errors['warning'] ?></div>
        <?php } ?>
        <form class="form" action="<?= DOC_ROOT ?>stylist/<?= html_escape($user['url_address']) ?>/cart/authenticate" method="POST" enctype="multipart/form-data">
          <div class=" form-row">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" placeholder="" id="name" class="form-input" value="<?= html_escape($booking['name'])  ?>" />
            <small class="form-alert"><?= $errors['name'] ?></small>
          </div>
          <div class="form-row">
            <label for="adress" class="form-label">Address</label>
            <input type="text" name="adress" id="adress" class="form-input" value="<?= html_escape($booking['adress']) ?>" />
            <small class="form-alert"><?= $errors['adress'] ?></small>
          </div>
          <div class="form-row">
            <label for="zip_code" class="form-label">Zip code</label>
            <input type="text" name="zip_code" id="zip_code" class="form-input" value="<?= html_escape($booking['zip_code'])  ?>" />
            <small class="form-alert"><?= $errors['zip_code'] ?></small>
          </div>
          <div class="form-row">
            <label for="tel" class="form-label">Tel</label>
            <input type="tel" name="tel" id="tel" class="form-input" value="<?= html_escape($booking['tel'])  ?>" />
            <small class="form-alert"><?= $errors['tel'] ?></small>
          </div>
          <div class="form-row">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-input" value="<?= html_escape($booking['email'])  ?>" />
            <small class="form-alert"><?= $errors['email'] ?></small>
          </div>
          <div class="form-row">
            <label for="textarea" class="form-label">Special request</label>
            <textarea name="description" class="form-textarea"><?= html_escape($booking['description']) ?></textarea>
            <small class="form-alert"><?= $errors['description'] ?></small>
          </div>
          <!-- <div class="form-row">
      <label for="textarea" class="form-label">Si vous avez une photo correspondant aux services ou coiffures que vous avez choisit vous pouvez l'envoyer</label>
      <input type="file" id="image_file" class="form-input" />
      <small class="form-alert">please provide value</small>
     </div> -->
          <div class="form-row">
            <input type="checkbox" name="terms" id="terms" <?= ($terms == 1) ? 'checked' : ''; ?>> <span> accept <a href="#">terms and conditions</a></span>
            <small class="form-alert"><?= $errors['terms'] ?></small>
          </div>
          <button type="submit" name="add_booking" class="btn btn-block">submit</button>
        </form>
      </section>

      <!-- cart  -->
      <?php include('includes/cart.php') ?>
      <!-- end of cart -->
    </div>
  </div>

  <!-- ************************** modals ************************ -->
  <?php include('includes/modals.php') ?>
</main>


<?php include('includes/footer.php') ?>