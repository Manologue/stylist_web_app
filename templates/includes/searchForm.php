<!-- handle with javascript  in searchForm.js-->
<form class="home-form" method="GET" action="<?= DOC_ROOT ?>search/">
 <div class="field field-except">
  <input type="text" value="" data-id="location" id="location-input" placeholder="Emplacement" autocomplete="off" readonly="readonly" />
  <input type="hidden" value="" data-id="location_2" id="location-input_2" name="location" placeholder="Emplacement" autocomplete="off" readonly="readonly" />
  <input type="hidden" value="" data-id="city_state" id="city_state-input_2" placeholder="Emplacement" autocomplete="off" readonly="readonly" />
  <div class="icons">
   <i class="fa-solid fa-location-dot"></i>
   <i class="uil uil-times"></i>
  </div>
 </div>
 <div class="field field-except">
  <input type="text" value="" data-id="services" class="services-field" id="services-input" placeholder="Enter services" autocomplete="off" readonly="readonly" />
  <input type="hidden" value="" data-id="services_2" class="services-field" id="services-input_2" name="services" placeholder="Enter services" autocomplete="off" readonly="readonly" />
  <div class="icons">
   <i class="fa-solid fa-scissors"></i>
   <i class="uil uil-times"></i>
  </div>
 </div>
 <?php if ($categories_list_page !== 'home') { ?>
  <div class="field field-date">
  <?php } ?>
  <input <?php if ($categories_list_page == 'home') { ?> type="hidden" <?php } else { ?> type="date" <?php } ?> value="" data-id="date" id="search-day" min='' name="day" lang="fr-CA" placeholder="Enter day" />
  <?php if ($categories_list_page !== 'home') { ?>
   <div class="icons">
    <i class="fa-solid fa-calendar-days"></i>
    <i class="uil uil-times"></i>
   </div>
  </div>
 <?php } ?>
 <div class="field search">
  <button class="btn" type="submit">search</button>
 </div>
</form>