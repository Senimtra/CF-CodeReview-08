<!--
  page content depending on session

  - navbar with login & sign up button
  - not logged-in users
      * 9 cards with best rated recipies
  - user-once logged-in
      * 9 cards with best rated recipies
      * Mealplan button
  #-admin
      * re-direction to dashboard.php
-->

<?php
session_start();

require_once 'components/db_connect.php';
// $sqlSelect = "SELECT * FROM recipes r INNER JOIN user u ON u.pk_userid = r.fk_userid ";
// $stmt = $connect->prepare($sqlSelect);
// $work = $stmt->execute();
// $result = $stmt->get_result();
// $recipeCard = '';
// if ($result->num_rows > 0) {
//   while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
//     $recipeCard .= '
//     <div class="col">
//       <div class="card h-100">
//         <img src="pictures/recipies/'. $row["recipe_picture"] .'"class="card-img-top" alt="...">
//         <div class="card-body">
//           <h5 class="card-title">'. $row["recipe_name"] .'</h5>
//           <p class="card-text">'. $row["prep_time"] .'</p>
//           <button class="btn btn-outline-success"><a href="recipies/recipe_details.php?id=' . $row['pk_recipeid'] . '"> Info </a></button>
//         </div>
//       </div>
//     </div>';
//   }
// } else {
//   $recipeCard = '
//   <div class="col">
//     <div class="card">
//       <div class="card-body">
//         <h5 class="card-title">Currently there are no recipes to be displayed.</h5>
//       </div>
//     </div>
//   </div>';
// }

$hero = '';

$sqlSelect = "SELECT r.*, u.*, ra.avg_rating FROM recipes r INNER JOIN user u ON u.pk_userid = r.fk_userid 
LEFT JOIN (SELECT fk_recipeid, AVG(rating) as avg_rating FROM rating GROUP by fk_recipeid) ra 
ON ra.fk_recipeid=r.pk_recipeid WHERE r.status != 'pending'
ORDER BY avg_rating DESC
LIMIT 9";
$stmt = $connect->prepare($sqlSelect);
$work = $stmt->execute();
$result = $stmt->get_result();
$recipeCard = '';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    //displaying recipes
    //Scroll Animation Start
    $recipeCard .= '
    <div class="wow slideInUp box">
 

    <div class="col">
      <div class="card m-3 tableColor">
        <img src="pictures/recipies/' . $row["recipe_picture"] . '"class="card-img-top p-4" alt="...">
        <div class="card-body bodyStyle">
          <h5 class="card-header ownColorText bg-transparent">' . $row["recipe_name"] . '</h5>
          <p class="card-header ownColorText bg-transparent">'.'<i class="far fa-clock"></i> ' . $row["prep_time"].' Min </p>
          <p class="card-header ownColorText bg-transparent">'. ROUND($row['avg_rating'],0) .'<i class="fas fa-star text-warning"></i>'.'</p>
          <p></p>
          <button class="btn colorBtn m-2 btn-sm"><a href="recipies/recipe_details.php?id=' . $row['pk_recipeid'] . '"> Info </a></button>
        </div>
      </div>
    </div>
    </div>';

    $hero = '  <div class="swiper-container mySwiper pt-3">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="https://images.pexels.com/photos/1095550/pexels-photo-1095550.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      <div class="swiper-slide"><img src="https://images.pexels.com/photos/2613471/pexels-photo-2613471.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      
      
      <div class="swiper-slide"><img src="https://images.pexels.com/photos/4198139/pexels-photo-4198139.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      
      <div class="swiper-slide"><img src="https://images.pexels.com/photos/4047193/pexels-photo-4047193.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      <div class="swiper-slide"><img src="https://images.pexels.com/photos/2613471/pexels-photo-2613471.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      <div class="swiper-slide"><img src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      <div class="swiper-slide"><img src="https://images.pexels.com/photos/1055271/pexels-photo-1055271.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      
    </div>
    <div class="swiper-pagination"></div>
  </div>
';

    //displaying dynamic hero depending on the user status (not loged in, admin & user)
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
      $btnSession = '
        <a class="btn colorBtn m-2 btn-sm  btn-block" href="./user/login.php?action=signup">Register now</a>
      ';
    } elseif (isset($_SESSION['user'])) {
      $btnSession = '
        <a href="recipies/recipe_create.php"> <button class="btn colorBtn m-2 btn-sm  btn-block"> Create Recipe </button></a>
        <a href="planner/planner.php"> <button class="btn colorBtn m-2 btn-sm btn-block"> Create Planer </button> </a>
        <a href="user/profile.php"> <button class="btn colorBtn m-2 btn-sm  btn-block"> See your profile </button> </a>
      
      ';
    } elseif (isset($_SESSION['adm'])) {
      $btnSession = '
        <a href="recipies/recipe_create.php"> <button class="btn colorBtn  btn-sm  btn-block"> Create Recipe </button> </a>
        <a href="ingredients/ingredient_create.php"> <button class="btn colorBtn  btn-sm btn-block">Add new ingredient</button> </a>
        <a href="user/dashboard.php"> <button class="btn colorBtn btn-sm btn-block">Go to dashboard</button> </a>
      ';
    }
  }
} //else statement in case there are no recipes to be displayed
else {
  $recipeCard = '
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Currently there are no recipes to be displayed.</h5>
      </div>
    </div>
  </div>';
}

$connect->close();

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <!--load amimate.css from CDN-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css"> 
  <!-- adding CSS, Bootstrap, Fonts & Awesome Icons to file -->
  <?php require_once 'css/CSS_bootst_fonts.php' ?>
  <style>
    <?php include 'css/style.css'; ?>.bodyStyle {
      background-color: #E2D6C8;
      border-radius: 1%;
    }

    /* html,
    body {
      position: relative;
      height: 100%;
    } */

    /* body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    } */
.containerBtn{
  margin-left: 22%;
}  
/* Swiper slides Start */
    .swiper-container {
      width: 50vw;
      height: 30vh;
      z-index: 0;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
 /* Swiper End */
 /* Animation Text Start */

    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap');

    * {
      padding: 0;
      margin: 0;
      font-family: 'Quicksand', sans-serif;
    }

    .animiStyle {
      position: absolute;
      top: 58%;
      left: 50%;
      transform: translate(-50%, -50%);
      border-right: 5px solid #262626;
      padding: 15px 15px;
      width: 550px;
      display: inline-block;
      box-sizing: border-box;
      animation: animate 4s infinite linear;
      overflow: hidden;
      font-size: 30px;
      font-weight: bold;
      color: #BFAB93;
      text-transform: uppercase;
      white-space: nowrap;
    }

    @keyframes animate {
      0% {
        width: 0;
        padding: 15px 0;
      }

      45% {
        width: 550px;
        padding: 15px 15px;
      }

      55% {
        width: 550px;
        padding: 15px 15px;
      }

      100% {
        width: 0;
        padding: 15px 0;
      }
    }

   
  </style>

  <title>Home</title>
</head>

<body>
  <!-- here is place to display a nice message to invite people to register -->
  <?php require_once 'sections/navbar.php'; ?>
 <!-- hero section -->
  <!-- Swiper -->
  <?php echo $hero ?>

  <div class="container containerBtn p-5 text-white">

    <?php echo $btnSession ?>

  </div>

  <div class="container p-5">
    <h4 class="animiStyle mt-3">Best rated by our community</h4>


    <div class="row row-cols-1 row-cols-sm-12 row-cols-md-2 p-5 m-5 row-cols-lg-3 g-4">
      <!-- displaying dynamically recipes from the DB -->
      <?php echo $recipeCard ?>
    </div>

  </div>

  <?php require_once 'sections/footer.php'; ?>
  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>



<!--load WOW js from CDN-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js">
</script>

<!--Initiate WOW js, can be at the bottom of your file -->
<script>
  wow = new WOW(
    {
        boxClass:     'wow',      // default
        animateClass: 'animated', // change this if you are not using animate.css
        offset:       0,          // default
        mobile:       true,       // keep it on mobile
        live:         true        // track if element updates
      }
    )
   wow.init();
</script>
</body>

</html>