<!--
  page shown for not logged in people
  no session
  navbar with login & sign up button
  3D Animation
  
-->
<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- adding CSS, Bootstrap, Fonts & Awesome Icons to file -->
  <?php require_once 'css/CSS_bootst_fonts.php' ?>
  <style>
    iframe {
      height: calc(100% - 170px);
      position: absolute;
      top: 70px;
      bottom: 10;
    }

    /* small devices (portrait phones, less than 576px) */
    @media (max-width: 576px) {
      iframe {
        height: calc(100% - 180px);
        position: absolute;
        top: 55px;
        bottom:0px!important;
      }
    }

    <?php include 'css/style.css'; ?>
  </style>
  <title>Welcome to Foodies</title>
</head>


<body>
  <!-- Navbar start -->
  <?php require_once '../APP/sections/navbar.php'; ?>
  <!-- Navbar  -->
  <!-- iframe from Spline library -->
  <iframe src='https://my.spline.design/team7-b8a65c7686b86dabbf7f3e176e80b39d/' frameborder='0' width='100%'></iframe>
  <!-- iframe from Spline library end -->
  <!-- Footer Start -->
  <?php require_once '../APP/sections/footer.php'; ?>
  <!-- Footer End -->
  <!-- adding JS Bootstrap to file -->
  <?php require_once 'js/JS_bootst.php'; ?>
</body>

</html>