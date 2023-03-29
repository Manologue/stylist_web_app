<!-- profile -->
<div class="profile stylist-div">
 <div class="img-container">
  <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($user['picture']) ?>" alt="" />
 </div>
 <div class="details">
  <h5><?= html_escape($user['first_name']) ?> <?= html_escape(mb_substr($user['name'], 0, 1))  ?>, mobile stylist in <?= html_escape($user['city_of_work']) ?></h5>
  <p class="experience"><span>experience</span>since <?= html_escape($user['years_exp']) ?> years</p>
 </div>
</div>
<!-- about -->
<div class="about stylist-div">
 <h5>about...</h5>
 <p>
  <?= html_escape($user['bio']) ?>
 </p>
</div>