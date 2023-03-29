<?php include('includes/header.php') ?>
<!------------------------------ HOME PAGE ----------------------->
<main id="login-page">
 <div class="section-center">
  <?php if ($success) { ?><div class="alert title alert-success"><?= $success ?></div> <?php } ?>
  <?php if ($warning) { ?><div class="alert title alert-danger"><?= $warning ?></div> <?php } ?>
  <section class="login-section">
   <!-- form  -->
   <form class="form" action="<?= DOC_ROOT ?>login" method="POST">
    <?php if ($errors['message']) { ?>
     <div class="alert alert-danger"><?= $errors['message'] ?></div>
    <?php } ?>
    <h5>Login to your account</h5>
    <div class="form-row">
     <label for="email" class="form-label">Email</label>
     <input type="email" name="email" id="email" class="form-input" />
     <small class="form-alert"><?= $errors['email'] ?></small>
    </div>
    <div class="form-row">
     <label for="password" class="form-label">Password</label>
     <input type="password" name="password" id="password" class="form-input" />
     <small class="form-alert"><?= $errors['password'] ?></small>
    </div>
    <button type="submit" class="btn btn-block">Log in</button>
    <div class="register-links">
     <a href="<?= DOC_ROOT ?>register">click to register </a>
     <br>
     <br>
     <a href="<?= DOC_ROOT ?>password-lost"> Forgot your password?</a>
    </div>
   </form>
  </section>
 </div>

</main>

<!-- ************************** modals ************************ -->
<?php include('includes/modals.php') ?>
<!------------------------------END OF HOME PAGE  ----------------------------->

<?php include('includes/footer.php') ?>