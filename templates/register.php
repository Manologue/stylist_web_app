<?php include('includes/header.php') ?>
<!------------------------------ HOME PAGE ----------------------->

<main id="register-page">
  <section class="section register-section">
    <div class="section-center">
      <h5>register as a mobile hairdresser</h5>
      <div class="register-center">
        <!-- desc -->
        <div class="short-description">
          <div class="text-container">
            <p>
              Be a Part of The First Network of Mobile Hairstylists & Mobile Barbers.
            </p>
            <div>
              <p>Create your profile in a few steps :</p>
              <ul>
                <li>Create your account and enter your details</li>
                <li>Create your account and enter your details</li>
                <li>Create your account and enter your details</li>
                <li>Create your account and enter your details</li>
              </ul>
            </div>
            <p>
              Not sure what you would do with our plateform ? Take 5 min and check
              the
              <span><a href="#">FAQ here</a></span>
            </p>
            <p>Still got questions ? Give us a call : 404-960-1747</p>
          </div>
        </div>
        <!-- form  -->
        <form method="POST" action="<?= DOC_ROOT ?>register" enctype="multipart/form-data">
          <?php if ($errors['warning']) { ?>
            <div class="alert alert-danger"><?= $errors['warning'] ?></div>
          <?php } ?>
          <div class="form-row">
            <label for="name" class="form-label">First name</label>
            <input type="text" placeholder="" name="first_name" value="<?= html_escape($user['first_name'])  ?>" id="first-name" class="form-input" />
            <small class="form-alert"><?= $errors['first_name'] ?></small>
          </div>
          <div class="form-row">
            <label for="lname" class="form-label">Name</label>
            <input type="text" placeholder="" name="name" value="<?= html_escape($user['name'])  ?>" id="name" class="form-input" />
            <small class="form-alert"><?= $errors['name'] ?></small>
          </div>
          <div class="form-row">
            <label for="adress" class="form-label">Address</label>
            <input type="text" id="adress" name="adress" value="<?= html_escape($user['adress'])  ?>" class="form-input" />
            <small class="form-alert"><?= $errors['adress'] ?></small>
          </div>
          <div class="form-row">
            <label for="city" class="form-label">Zip code</label>
            <input type="text" name="zip_code" value="<?= html_escape($user['zip_code'])  ?>" id="zip_code" class="form-input" />
            <small class="form-alert"><?= $errors['zip_code'] ?></small>
          </div>
          <div class="form-row">
            <label for="tel" class="form-label">Tel</label>
            <input type="tel" name="tel" id="tel" value="<?= html_escape($user['tel'])  ?>" class="form-input" />
            <small class="form-alert"><?= $errors['tel'] ?></small>
          </div>
          <div class="form-row">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="<?= html_escape($user['email'])  ?>" class="form-input" />
            <small class="form-alert"><?= $errors['email'] ?></small>
          </div>
          <div class="form-row">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-input" />
            <small class="form-alert"><?= $errors['password'] ?></small>
          </div>
          <div class="form-row">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-input" />
            <small class="form-alert"><?= $errors['confirm_password'] ?></small>
          </div>
          <div class="form-row">
            <input type="checkbox" name="terms" id="terms" <?= ($terms == 1) ? 'checked' : ''; ?>> <span> accept <a href="#">terms and conditions</a></span>
            <small class="form-alert"><?= $errors['terms'] ?></small>
          </div>
          <button type="submit" name="register" class="btn btn-block">Register</button>
          <a class="login" href="<?= DOC_ROOT ?>login"> Already an account? Click to login</a>
        </form>
      </div>
    </div>
  </section>
</main>

<!-- ************************** modals ************************ -->
<?php include('includes/modals.php') ?>
<!------------------------------END OF HOME PAGE  ----------------------------->

<?php include('includes/footer.php') ?>