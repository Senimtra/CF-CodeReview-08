<?php

# navbar with links to --> logout, all recipes, add recipe, add meal plan

# user_dashboard page -- is shown only to logged in user
# user's own profile page with picture, first_name, last_name, email, birthday etc.
# displaying user's recipes
# user can see only his/her recipes 
# when user clicks on "details" -- he/she is redirected ../recipies/recipe_details.php
# showing user's individual mealplan:
# user can see only his/her meal plan 
# when user clicks on "details" -- he/she is redirected to the page of the specific meal plan ../planner/planner_details.php
# button "edit profile" -- when user clicks he/she is redirected to update.php

session_start();
require_once '../components/db_connect.php';
require_once '../components/sessions.php';

#fetching only user data
$request = mysqli_query($connect, "SELECT * FROM user WHERE pk_userid =" . $_SESSION['user']);
$row = mysqli_fetch_array($request, MYSQLI_ASSOC);

//echo "hi" .$row['pk_userid'] ;
//var_dump($request);

$recQuery = mysqli_query($connect, "SELECT * FROM recipes
  inner join user
  on recipes.fk_userid = user.pk_userid
  WHERE pk_userid =" . $_SESSION['user']);
// $rowRU = mysqli_fetch_all($recQuery, MYSQLI_ASSOC);
// var_dump($rowRU);
$cardUsRec = '';

if (mysqli_num_rows($recQuery) > 0) {
  while ($rowRU = mysqli_fetch_array($recQuery, MYSQLI_ASSOC)) {
    //var_dump($rowRU);
    $cardUsRec .= '
      <div class="col">
      <div class="card m-3 tableColor">
      <img src="../pictures/recipies/' . $rowRU['recipe_picture'] . '" class="card-img-top p-4"  alt="' . $rowRU['recipe_name'] . '">
        <div class="card-body bodyStyle">
          <h5 class="card-header ownColorText bg-transparent">' . $rowRU['recipe_name'] . '</h5>
          <p class="card-header ownColorText bg-transparent">' . $rowRU['recipe_type'] . '</p>
          <div class="card-footer">
          <small class="text-muted">Preparation time ' . $rowRU['prep_time'] . ' minutes</small>
          <a href="../recipies/recipe_update.php?id=' . $rowRU["pk_recipeid"] . '" class="btn colorBtn m-2 btn-sm  btn-block">Edit</a>
          <a href="../recipies/recipe_details.php?id=' . $rowRU["pk_recipeid"] . '" class="btn colorBtn m-2 btn-sm">Details</a>
          <a href="../recipies/recipe_delete.php?id=' . $rowRU["pk_recipeid"] . '" class="btn colorBtn m-2 btn-sm text-danger btn-block">Delete
          </a>
          </div>
        </div>
        </div>
      </div>
      ';
  }
} else {
  $cardUsRec = '
      <div><h3 class="text-danger">Nothing to display yet.</h3>
      <hr>
      <h5>Do you want to add a recipe?</h5>
      <a href="../recipies/recipe_create.php" class="btn mb-5 colorBtn">Add recipe</a>
      <h5>See other recipes</h5>
      <a href="../recipies/recipies.php" class="btn colorBtn">Get inspired</a>
      </div>';
}


// Queries for date filter

$user = $_SESSION['user'];

if ($_POST) {
  $dateFrom = $_POST['dateFrom'];
  $dateTo = $_POST['dateTo'];

  $planQuery = "SELECT pk_weekplan, date, number_serv, weekplan.time, recipe_name
FROM `weekplan`
INNER JOIN `user` on weekplan.fk_userid = user.pk_userid
INNER JOIN `recipes` on weekplan.fk_recipeid = pk_recipeid WHERE date between '$dateFrom' and '$dateTo' AND fk_userid =".$user." ORDER BY `date`";
} else {
 $planQuery = "SELECT pk_weekplan, date, number_serv, weekplan.time, recipe_name
FROM `weekplan`
INNER JOIN `user` on weekplan.fk_userid = user.pk_userid
INNER JOIN `recipes` on weekplan.fk_recipeid = pk_recipeid 
WHERE weekplan.fk_userid =".$user." ORDER BY `date`";
}


$result = mysqli_query($connect, $planQuery);

$tbodyPlan = '';
if ($result->num_rows > 0) {
  while ($rowPlan = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    //to display only weekday for date:
    $dateF = DateTime::createFromFormat('Y-m-d', $rowPlan['date']);

    $tbodyPlan .= "
      <tr>
        <td>" . $dateF->format('W') . "</td>
        <td>" . $dateF->format('Y') . "</td>
        <td>" . $dateF->format('l') . "</td>
        <td>" . $rowPlan['recipe_name'] . "</td>
        <td>" . $rowPlan['number_serv'] . "</td>
        <td>" . $rowPlan['time'] . "</td>
        <td>
          <a href='../planner/planner_update.php?id=" . $rowPlan['pk_weekplan'] . "'><button class='btn colorBtn btn-sm' type='button'>Edit</button></a>
          <a href='../planner/planner_details.php?id=" . $rowPlan['pk_weekplan'] . "'><button class='btn colorBtn btn-sm' type='button'>Details</button></a>
          <a href='../planner/planner_delete.php?id=" . $rowPlan['pk_weekplan'] . "'><button class='btn colorBtn text-danger btn-sm' type='button'>Delete</button></a>
        </td>
      </tr>";
  }
} else {
  $tbodyPlan .= "
      <tr><td colspan='7'><center>No Data Available </center></td></tr>
      <tr><td colspan='7'><center>Do you want to add a new meal plan?</center></td></tr>
      <tr>
        <td colspan='7'>
          <center>
            <a href='../planner/planner_create.php' class='btn colorBtn'>Add meal plan</a>
            <a href='../planner/planner.php' class='btn colorBtn'>Get inspired</a>
          </center>
        </td></tr>      
      ";
}


$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--load amimate.css from CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css">
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <!-- adding CSS, Bootstrap, Fonts & Awesome Icons to file -->
  <?php require_once '../css/CSS_bootst_fonts.php' ?>
  <style>
    <?php include '../css/style.css'; ?>@import url('https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Lato&family=Metal+Mania&family=Roboto&display=swap');


    .bodyStyle {
      background-color: #E2D6C8;
      border-radius: 1%;
    }

    .profileStyle {
      /* <img src="https://img.icons8.com/wired/64/000000/omlette.png" /> */
      /* background-image: linear-gradient(90deg, rgba(141, 53, 51, 0.85) 40%, rgba(200, 181, 151, 1) 100%); */
       width: 22%;
       box-shadow: 8px 8px 10px rgba(var(--dark-clr), 0.2),
                -8px -8px 10px rgba(255, 255, 255), 0.8);
      background-color:#98bec9;
      /* background:url(https://img.icons8.com/wired/64/000000/omlette.png)center; */
      border-radius: 1%;
      color: white;
    }

    .animiStyle {
      font-family: 'Quicksand', sans-serif;
    }


  </style>

  <title>Welcome <?php echo $row['first_name']; ?>!</title>
</head>

<body>

  <!-- Navbar Start-->
  <?php require_once '../sections/navbar.php'; ?>
  <!-- Navbar End-->

  <!-- here is place to display user's profile -->
  <div class="container containerBody p-2">
    <div class="main-body">
      <div class="card-columns">
        <div class="col-md-12 mb-3 col-lg-12">
          <div class="card">
            <div class="card-body">
            	<div class="profileStyle">
						<img
							scr="http://openweathermap.org/img/wn/02d@2x.png"
							alt="Image"
							id="icon"
							width="50px"/>
						<span id="city"> Vienna </span> - Currently<span id="current-temperature"> 17 </span>°C 
						
				</div>
              <div class="d-flex flex-column align-items-center text-center">
                <img width="150px" class="rounded-circle" src="../pictures/user/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
                <div class="mt-3">
                  <h1 style="font-family: 'Quicksand', sans-serif;">Welcome <?php echo $row['first_name']; ?>!</h1><img src="https://img.icons8.com/wired/64/000000/omlette.png" />
                  <button class="btn"><a class="btn btn-outline-warning" href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a></button>
                  <a class="btn colorBtn  btn-sm" href="#recipies">My recipes</a>
                  <a class="btn colorBtn btn-sm" href="#planner">My meal plan</a>
                </div>
              </div>
            </div>

          </div>
        </div>
<div>
				
        <!-- REcipies card Start-->
        <div class="wow fadeInLeft box">
          <div class="container p-5">
            <hr>
            <h3 id="recipies" class="text-center p-1">My recipes</h3>
            <p id="recipies" class="text-center p-1" style="color: #BFAB93;">GET COOKING & SHARING</p>
            <hr>
            <div class="row row-cols-1 row-cols-sm-12 handySize row-cols-md-2 p-5 m-5 row-cols-lg-3 g-4">
              <?php echo $cardUsRec ?>
            </div>
          </div>
          <hr>
            <h3 id="recipies" class="text-center p-1">Meal planner</h3>
            <p id="recipies" class="text-center p-1" style="color: #BFAB93;">Create your meal plan right here in seconds.</p>
            <hr>
          <!-- REcipies card End -->
          <!-- meal planner Start -->
          <div class="col-sm-1 mb-3 col-lg-12 col-md-12">
            <div class="card h-100">
              <div class="card-body">

                <div class="table table-responsive-sm table-responsive-md">
                  <table class="table">
                    <thead>
                      <div id="planner" class="p-2">
                       
                        <form action="profile.php#plan" method="post" enctype="multipart/form-data">
                          <table class='table  table-hover'>
                            <tr>
                              <td><input class="form-control" type="date" name="dateFrom" /></td>
                              <td><input class="form-control" type="date" name="dateTo" /></td>
                              <td><button class='btn colorBtn btn-sm' type="submit">Select period</button><a href='profile.php'><button class='btn colorBtn btn-sm  ms-1' type='button'>Select all</button></a></td>
                            </tr>

                          </table>
                        </form>
                        <div class="table table-hover table-responsive-sm" id="plan">
                          <table class="table">
                            <thead class="">
                              <tr>
                                <th>Week</th>
                                <th>Year</th>
                                <th>Weekday</th>
                                <th>Meal</th>
                                <th>No. of servings</th>
                                <th>Mealtime</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?= $tbodyPlan ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </thead>
                </div>
              </div>
            </div>
          </div>
          <!-- meal planner End -->


        </div>
      </div>
    </div>


    <!-- adding JS Bootstrap to file -->
    <?php require_once '../js/JS_bootst.php'; ?>

    <!--load WOW js from CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js">
    </script>

    <!--Initiate WOW js, can be at the bottom of your file -->
    <script>
      wow = new WOW({
        boxClass: 'wow', // default
        animateClass: 'animated', // change this if you are not using animate.css
        offset: 0, // default
        mobile: true, // keep it on mobile
        live: true // track if element updates
      })
      wow.init();
    </script>
     <script src="../js/weather.js"></script>
</body>

</html>