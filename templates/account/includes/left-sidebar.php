<div class="leftside-menu">

 <!-- LOGO -->
 <a href="<?= DOC_ROOT  ?>" class="logo text-center logo-light">
  <span class="logo-lg">
   <img src="<?= DOC_ROOT ?>dashboard/assets/images/logo.png" alt="" height="16">
  </span>
  <span class="logo-sm">
   <img src="<?= DOC_ROOT ?>dashboard/assets/images/logo_sm.png" alt="" height="16">
  </span>
 </a>

 <!-- LOGO -->
 <a href="<?= DOC_ROOT  ?>" class="logo text-center logo-dark">
  <span class="logo-lg">
   <img src="<?= DOC_ROOT ?>dashboard/assets/images/logo-dark.png" alt="" height="16">
  </span>
  <span class="logo-sm">
   <img src="<?= DOC_ROOT ?>dashboard/assets/images/logo_sm_dark.png" alt="" height="16">
  </span>
 </a>

 <div class="h-100" id="leftside-menu-container" data-simplebar="">

  <!--- Sidemenu -->
  <ul class="side-nav">

   <li class="side-nav-title side-nav-item">Navigation</li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>account/index" class="side-nav-link">
     <i class="dripicons-gear noti-icon"></i>
     <!-- <span class="badge bg-success float-end">4</span> -->
     <span> Settings </span>
    </a>
   </li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>account/bookings" class="side-nav-link">
     <i class="uil-layer-group"></i>
     <span> Bookings </span>
    </a>
   </li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>account/services" class="side-nav-link">
     <i class="uil-briefcase"></i>
     <span> Services </span>
    </a>
   </li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>account/availability" class="side-nav-link">
     <i class="uil-schedule"></i>
     <span> availability </span>
    </a>
   </li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>account/password" class="side-nav-link">
     <i class="uil-lock-slash"></i>
     <span> Password </span>
    </a>
   </li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>account/profile" class="side-nav-link">
     <i class="uil-user-circle"></i>
     <span> Profile </span>
    </a>
   </li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>stylist_profile/<?= html_escape($_SESSION['url_address']) ?>" class="side-nav-link">
     <i class="dripicons-preview"></i>
     <span> View site profile </span>
    </a>
   </li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>account/identity" class="side-nav-link">
     <i class="uil-chat-bubble-user"></i>
     <span> Identity </span>
    </a>
   </li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>account/service_location" class="side-nav-link">
     <i class="uil-location-point"></i>
     <span> Service Location </span>
    </a>
   </li>

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>account/gallery" class="side-nav-link">
     <i class="uil-images"></i>
     <span> Gallery </span>
    </a>
   </li>
   <!-- <li class="side-nav-item">
    <a href="apps-chat.html" class="side-nav-link">
     <i class="uil-comments-alt"></i>
     <span> Gallery </span>
    </a>
   </li> -->

   <li class="side-nav-item">
    <a href="<?= DOC_ROOT  ?>logout" class="side-nav-link">
     <i class="uil-entry"></i>
     <span> logout </span>
    </a>
   </li>

  </ul>

  <!-- End Sidebar -->

  <div class="clearfix"></div>

 </div>
 <!-- Sidebar -left -->

</div>