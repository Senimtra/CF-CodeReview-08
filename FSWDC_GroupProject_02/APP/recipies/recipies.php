<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/sessions.php';
$hero = '';
// for dropdown recipe_type
//need distinct and column, otherwise it will show 
//type for each row
$recipeType = "";
$result = mysqli_query($connect, "SELECT DISTINCT recipe_type FROM recipes");

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $recipeType .=
    "<option value='{$row['recipe_type']}' >{$row['recipe_type']}</option>";
}

// Filter by Recipe_type:

if (isset($_POST['filterbtn'])) {
  $selRecType = $_POST['recipe_type'];
  $sqlSelect = "SELECT r.*, u.* FROM recipes r INNER JOIN user u ON u.pk_userid = r.fk_userid WHERE r.status != 'pending' AND r.recipe_type = '$selRecType'
  ";
 } else {
  $sqlSelect = "SELECT r.*, u.* FROM recipes r INNER JOIN user u ON u.pk_userid = r.fk_userid WHERE r.status != 'pending'";
}
 

//Für Suchfunktion
// if (isset($_POST["searchBtn"])) {
//   //Was über Suchfeld kommt
//   $search = "%" . strip_tags($_POST["recSearch"]) . "%";
//   // echo $search;
//  $sqlSelect = "SELECT r.*, u.*, ra.avg_rating FROM recipes r INNER JOIN user u ON u.pk_userid = r.fk_userid 
//   LEFT JOIN (SELECT fk_recipeid, AVG(rating) as avg_rating FROM rating GROUP by fk_recipeid) ra 
//   ON ra.fk_recipeid=r.pk_recipeid WHERE r.status != 'pending' AND r.recipe_name LIKE '$search'
//   ORDER BY avg_rating DESC";
// } else {
//   $sqlSelect = "SELECT r.*, u.*, ra.avg_rating FROM recipes r INNER JOIN user u ON u.pk_userid = r.fk_userid 
//   LEFT JOIN (SELECT fk_recipeid, AVG(rating) as avg_rating FROM rating GROUP by fk_recipeid) ra 
//   ON ra.fk_recipeid=r.pk_recipeid WHERE r.status != 'pending'
//   ORDER BY avg_rating DESC";
// }


$stmt = $connect->prepare($sqlSelect);
$work = $stmt->execute();
$result = $stmt->get_result();

$tbody = '';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $tbody .= '<a href="recipe_details.php?id='.$row["pk_recipeid"].'">
    <div class="wow slideInUp box">
 

    <div class="col">
      <div class="card m-3 tableColor">
        <img src="../pictures/recipies/' . $row["recipe_picture"] . '"class="card-img-top p-4" alt="">
        <div class="card-body bodyStyle">
          <h5 class="card-header ownColorText bg-transparent">' . $row["recipe_name"] . '</h5>
          <h5 class="card-header ownColorText bg-transparent">' . $row["first_name"] . '</h5>
          <p class="card-header ownColorText bg-transparent">'.'<i class="far fa-clock"></i> ' . $row["prep_time"].' Min </p>
         
        </div>
      </div>
    </div>
    </div>
    </a>';
    
    
    $hero = '  <div class="swiper-container mySwiper pt-3">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1476718406336-bb5a9690ee2a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=934&q=80" alt="">
        
      </div>

      <div class="swiper-slide"><img src="https://images.pexels.com/photos/1030947/pexels-photo-1030947.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      <div class="swiper-slide"><img src="https://images.pexels.com/photos/4725642/pexels-photo-4725642.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1542317890-1593157f228e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2250&q=80" alt=""></div>
     <div class="swiper-slide"><img src="https://images.pexels.com/photos/1055272/pexels-photo-1055272.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt=""></div>
      <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1502747220144-846486e80891?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2200&q=80" alt=""></div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
';

    //displaying dynamic hero depending on the user status (not loged in, admin & user)
    if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
      $btnSession = '
        <a class="btn colorBtn m-2 btn-sm  btn-block" href="login.php?action=signup">Register now</a>
      ';
    } elseif (isset($_SESSION['user'])) {
      $btnSession = '
        <a href="../recipies/recipe_create.php"> <button class="btn colorBtn m-2 btn-sm  btn-block"> Create Recipe </button></a>
       
      
      ';
    } elseif (isset($_SESSION['adm'])) {
      $btnSession = '
        <a href="../recipies/recipe_create.php"> <button class="btn colorBtn  btn-sm  btn-block"> Create Recipe </button> </a>
        <a href="../ingredients/ingredient_create.php"> <button class="btn colorBtn  btn-sm btn-block">Add new ingredient</button> </a>
        <a href="../user/dashboard.php"> <button class="btn colorBtn btn-sm btn-block">Go to dashboard</button> </a>
      ';
    }
  }
    
    //else statement in case there are no recipes to be displayed
  }else {
  $tbody =  '
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
  <?php require_once '../css/CSS_bootst_fonts.php' ?>
  <style>
    <?php include '../css/style.css'; ?>
  

/* .containerBtn{
  margin-left: 22%;
}   */
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
    
    
    
    

  </style>

  <title>Our Recipes</title>
</head>

<body>

 <!-- here is place to display a nice message to invite people to register -->
 <?php require_once '../sections/navbar.php'; ?>

 <!-- hero section -->
  <!-- Swiper -->
  <?php echo $hero ?>

  <div class="container containerBtn p-5 text-white">

<?php echo $btnSession ?>

</div>

 
  


 <div class="container p-5">
<hr>
     <h3 id="recipies" class="text-center p-1">Recipes</h3>
     <p id="recipies" class="text-center p-1">GET COOKING & SHARING</p>
 <hr class='mb-5'>

 <form action="recipies.php#search" method="post" enctype="multipart/form-data">
      <table class="table table-light" id="search">
        <!--Search function:-->
        <!-- <td><input class="form-control" type="text" name="recSearch" placeholder="Recipe">
        <td><button class='btn colorBtn btn-sm ' type="submit" name="searchBtn">Search</button></td>
        <td> <a href='recipies.php#search'><button class='btn colorBtn text-warning btn-sm  ms-1' type='button'>All recipes</button></a></td>
        </td> -->
    <!--dropdown for filter:-->
    <td class="text-end"><select select class="form-select" name="recipe_type" aria-label="Default select example"><?php echo  $recipeType; ?></select></td>
        <td class="text-start"><button class='btn colorBtn btn-sm' type="submit" name="filterbtn">Select type</button>
    </table>
    </form>

   



    <div class="row row-cols-1 bg-light row-cols-md-2 mt-1 m-5 handySize row-cols-lg-3 g-4">
      <!-- displaying dynamically recipes from the DB -->
      <?php echo $tbody ?>
    </div>
</div>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
<?php require_once '../js/JS_bootst.php'; ?>


   
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