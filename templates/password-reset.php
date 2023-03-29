<?php include('includes/header.php') ?>
<!------------------------------ HOME PAGE ----------------------->
<main id="login-page">
 <div class="section-center">
  <section class="main login-section">
   <!-- form  -->
   <form class="form" action="?token=<?= $token ?>" method="POST">
    <?php if ($errors['message']) { ?>
     <div class="alert alert-danger"><?= $errors['message'] ?></div>
    <?php } ?>
    <h5>change password</h5>
    <div class="form-row">
     <label for="password" class="form-label">Password</label>
     <input type="password" name="password" id="password" class="form-input" />
     <small class="form-alert"><?= $errors['password'] ?></small>
    </div>
    <div class="form-row">
     <label for="confirm" class="form-label">confirm password</label>
     <input type="password" name="confirm" id="confirm" class="form-input" />
     <small class="form-alert"><?= $errors['confirm'] ?></small>
    </div>
    <button type="submit" class="btn btn-block">submit</button>
   </form>
  </section>
 </div>

</main>

<!-- ************************** modals ************************ -->
<?php include('includes/modals.php') ?>
<!------------------------------END OF HOME PAGE  ----------------------------->

<?php include('includes/footer.php') ?>