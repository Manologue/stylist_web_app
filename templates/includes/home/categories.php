<section class="section services" id="services">
 <h4 style="color: white" class="title">Our services</h4>

 <div class="section-center services-center">
  <?php if ($categories) { ?>
   <?php foreach ($categories as $category) { ?>
    <a href="<?= DOC_ROOT ?>hairdressing/<?= $category['seo_title'] ?>" class="product-card">
     <div class="hover-screen"></div>
     <img src="<?= DOC_ROOT ?>uploads/<?= html_escape($category['image']) ?>" alt="" />
     <div class="product-desc">
      <h5><?= html_escape($category['title']) ?></h5>
      <p><span>At-Home</span></p>
     </div>
    </a>
   <?php } ?>
  <?php } else { ?>
   <div class="section-center">
    <h5 class="title">no service to offer</h5>
   </div>
  <?php } ?>
 </div>
</section>