<div class="results-center">
  <?php
  if (count($users) < 1 || empty($users)) {
    echo "<p>Sorry, we do not have a hairdresser corresponding exactly to your request. Please make changes, we may have options for you another time or in a more specific location.</p>";
  } else {

    $i = 0;
    foreach ($users as $user) {
      $users_infos[$i];

      foreach ($users_infos[$i] as $user_info) {
        $user['category_list'][] = $user_info['category'];
      }

      $user['category_list'] = implode(", ", $user['category_list']);

      $i++; ?>
      <a href="<?= DOC_ROOT ?>stylist/<?= $user['url_address'] ?>" class="article">
        <div class="desc">
          <div class="img-container">
            <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($user['picture']) ?>" alt="<?= html_escape($user['picture']) ?>" />
          </div>
          <div class="about-container">
            <span class="name"><?= html_escape($user['username']) ?></span>
            <p class="city"><?= html_escape($user['city_of_work']) ?></p>
            <p class="experience"><span>experience</span>since <?= html_escape($user['years_exp']) ?> years</p>
            <p class="price">starting at <span><?= html_escape($user['price_starter']) ?>€</span></p>
          </div>
        </div>
        <div class="services">
          <i class="fa-solid fa-scissors"></i>
          <p><?= html_escape($user['category_list']) ?></p>
        </div>
      </a>
  <?php }
  } ?>

  <!-- end of single result -->
</div>