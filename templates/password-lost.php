<?php include('includes/header.php') ?>
<!------------------------------ HOME PAGE ----------------------->
<main id="login-page">
 <div class="section-center">
  <section class="main login-section">
   <!-- form  -->
   <?php if (!$sent) { ?>
    <form class="form" action="<?= DOC_ROOT ?>password-lost" method="POST">
     <h5>Forgot password?</h5>
     <div class="form-row">
      <label for="email" class="form-label">Enter your Email</label>
      <input type="email" name="email" id="email" class="form-input" />
      <small class="form-alert"><?= $error ?></small>
     </div>
     <button type="submit" class="btn btn-block">Send Email to reset password</button>
    </form>
   <?php } else { ?>
    <h5>If your address is registered, we will email instructions to reset your password.</h5>
    <a class="btn" href="<?= DOC_ROOT ?>login">back to login page</a>
   <?php } ?>
  </section>
 </div>
</main>

<!-- ************************** modals ************************ -->
<?php include('includes/modals.php') ?>
<!------------------------------END OF HOME PAGE  ----------------------------->

<?php include('includes/footer.php') ?>