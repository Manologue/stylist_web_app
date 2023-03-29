<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Document</title>
 <!-- font awesome link  -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" />
 <!-- custom css file link  -->
 <link rel="stylesheet" href="<?= DOC_ROOT ?>css/style.css?v=<?= time(); ?>" />
 <!-- <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css"> -->

 <!-- js links -->
 <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
 <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" /> -->
 <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">



</head>

<body>
 <!------- header  ------->
 <header class="header">
  <!-- navbar -->
  <nav class="navbar section-center">
   <a href="<?= DOC_ROOT ?>">
    <img class="logo" src="<?= DOC_ROOT ?>images/logo-stylist-2.jpeg" alt="" />
   </a>

   <div id="menu-btn" class="fas fa-bars"></div>


   <!-- links -->
   <ul class="links">
    <!-- mon experience coiffure -->
    <?php if (isset($_SESSION['role'])) { ?>
     <li>
      <a class="btn btn-coiffe" href="<?= DOC_ROOT ?>login">Profile</a>
     </li>
     <li>
      <a class="btn btn-coiffe" href="<?= DOC_ROOT ?>logout">Log out</a>
     </li>
    <?php } else { ?>
     <li>
      <a class="btn btn-coiffe" href="<?= DOC_ROOT ?>login">Log in</a>
     </li>
     <li>
      <a class="btn btn-coiffe btn-stylist" href="<?= DOC_ROOT ?>register">Become a mobile hairdresser</a>
     </li>
    <?php } ?>
   </ul>
   <?php if (!isset($_SESSION['role'])) { ?>
    <!-- <a class="collaborator-link" href="<?= DOC_ROOT ?>register">Become a mobile hairdresser</a> -->
   <?php } ?>
  </nav>
  <!-- sidebar -->
  <aside class="sidebar">
   <div id="close-btn" class="fas fa-times"></div>

   <!-- links -->
   <ul class="links">
    <?php if (isset($_SESSION['role'])) { ?>
     <li>
      <a href="<?= DOC_ROOT ?>login">Profile</a>
     </li>
     <li>
      <a href="<?= DOC_ROOT ?>logout">Log out</a>
     </li>
    <?php } else { ?>
     <li>
      <a href="<?= DOC_ROOT ?>login">Log in</a>
     </li>
     <li>
      <a href="<?= DOC_ROOT ?>register">Become a mobile hairdresser</a>
     </li>
    <?php } ?>
   </ul>
  </aside>
 </header>
 <!-- end header -->