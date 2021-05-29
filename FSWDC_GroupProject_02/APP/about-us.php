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

  .about-us{
    z-index: -1;
  }

  .myImage {
  max-height: 80vh;
  /*  or 100% of container */
  width: 100%;
  /* or 100% of container */
  -o-object-fit: cover;
    object-fit: cover;
  /* none can be an option too as cover may deform it*/
  -o-object-position: 50% 50%;
    object-position: 50% 50%;
  /* if both 50% will center it*/
  }

  .cardHeight {
    max-height: 80vh;
    /*  or 100% of container */
  }

  .employeeImg {
    display: inline-block;
    width: 200px;
  height: 200px;
    max-height: 17em;
    -o-object-fit: cover;
      object-fit: cover;
    /* none can be an option too as cover may deform it*/
    -o-object-position: 50% 50%;
      object-position: 50% 50%;
    /* if both 50% will center it*/
  }
  /*# sourceMappingURL=home.component.css.map */
  </style>
  <title>About us</title>
</head>
<body>
  <!-- navbar -->
  <?php require_once 'sections/navbar.php'; ?>


  <!-- team -->
  <div class="px-4 mt-3 mb-3 pt-3 pb-3 bg-light about-us">
    <h1 class="text-center pb-3 text-uppercase fw-light">our team</h1>
    <div class="row row-cols-1 row-cols-lg-5 gx-4">
      <div class="col">
       <div class="p-3 text-center h-100">
         <img src="../APP/pictures/AboutUs/Natalia Bochenek_Foto_1000x1000.png" class="mx-auto d-block rounded-circle shadow employeeImg border-gold" alt="...">
         <h4 class="pt-2 fs-5 fw-light text-uppercase">Natalia Bochenek</h4>
         <p class="fontSmall-13">Aspring Full Stack Developer</p>
        </div>
      </div>
      <div class="col">
        <div class="p-3 text-center h-100">
          <img src="../APP/pictures/user/Gregor.jpg" class="mx-auto d-block rounded-circle shadow employeeImg border-gold" alt="...">
          <h4 class="pt-2 fs-5 fw-light text-uppercase">Gregor</h4>
          <p class="fontSmall-13">Aspring Full Stack Developer</p>
        </div>
      </div>
      <div class="col">
        <div class="p-3 text-center h-100">
          <img src="../APP/pictures/AboutUs/Foto Laura Schulze Brockhausen Kopie.jpg" class="mx-auto d-block rounded-circle shadow employeeImg border-gold" alt="...">
          <h4 class="pt-2 fs-5 fw-light text-uppercase">Laura Brockhausen</h4>
          <p class="fontSmall-13">Aspring Back-End Developer</p>
        </div>
      </div>
      <div class="col">
        <div class="p-3 text-center h-100">
          <img src="../APP/pictures/AboutUs/Mario Hartleb.jpg" class="mx-auto d-block rounded-circle shadow employeeImg border-gold" alt="...">
          <h4 class="pt-2 fs-5 fw-light text-uppercase">Mario Hartleb</h4>
          <p class="fontSmall-13">Aspring Full Stack Developer</p>
        </div>
      </div>
      <div class="col">
        <div class="p-3 text-center h-100">
          <img src="../APP/pictures/AboutUs/yas.png" class="mx-auto d-block rounded-circle shadow employeeImg border-gold" alt="...">
          <h4 class="pt-2 fs-5 fw-light text-uppercase">Yasmin Nejat</h4>
          <p class="fontSmall-13">Aspring Front-End Developer</p>
        </div>
      </div>
    </div>
  </div>

  <?php require_once 'sections/footer.php'; ?>
  <!-- adding JS Bootstrap to file -->
  <?php require_once 'js/JS_bootst.php'; ?>
</body>
</html>