<?php

# navbar with links to --> logout, all recipies, add recipe, add meal plan, add user, add ingredient
# Admin dashboard page -- is shown only to admin
# list of all users
# list of all recipies
# list of all ingredients
# list of all meal planners together with user id & user name
session_start();
require_once '../components/db_connect.php';
require_once '../components/admsession.php';

#session
// $id = $_SESSION['adm'];
$user_type = 'adm';
# list of pedning recipes
$sqlpending = "SELECT * FROM recipes  WHERE status = 'pending'ORDER BY recipe_name";
$resultRecp = mysqli_query($connect, $sqlpending);
$tbodypen = "";
if ($resultRecp->num_rows > 0) {
  while ($rowRecp = $resultRecp->fetch_array(MYSQLI_ASSOC)) {
    $tbodypen .= "
      <tr>
        <td><img class='img-thumbnail rounded-circle' style='height:50px' src='../pictures/recipies/" . $rowRecp['recipe_picture'] . "' alt=" . $rowRecp['recipe_name'] . "></td>
        <td>" . $rowRecp['recipe_name'] . "</td>
        <td>" . $rowRecp['prep_time'] . "</td>
        <td>" . $rowRecp['recipe_type'] . "</td>
        <td>
          <a href='../recipies/recipe_accept.php?id=" . $rowRecp['pk_recipeid'] . "'><button class='btn colorBtn btn-sm' type='button'> Accept </button></a>
          <a href='../recipies/recipe_delete.php?id=" . $rowRecp['pk_recipeid'] . "'><button class='btn colorBtn text-danger btn-sm' type='button'>Delete</button></a>
          </td>
      </tr>";
  }
} else {
  $tbodypen = "<tr><td colspan='5'><center>No  pending Recipes </center></td></tr>";
};



//User Search Function
if (isset($_POST["userBtn"])) {
  //Was über Suchfeld kommt
  $userSearch = "%" . strip_tags($_POST["userSearch"]) . "%";
  // echo $search;

  $sqlUser = "SELECT * FROM user WHERE user_type != ? AND last_name like '$userSearch' ORDER BY last_name";
} else {
  $sqlUser = "SELECT * FROM user WHERE user_type != ? ORDER BY last_name";
}


//Select all-Users-Button
if (isset($_POST["allUserBtn"])) {

  $sqlUser = "SELECT * FROM user WHERE user_type != ? ORDER BY last_name";
}




# list of all users
// $sqlUser = "SELECT * FROM user WHERE user_type != ? ORDER BY last_name";
$stmtU = $connect->prepare($sqlUser);
$stmtU->bind_param("s", $user_type);
$work = $stmtU->execute();
$resultU = $stmtU->get_result();

//this variable will hold the body for the users table
$tbodyU = '';
if ($resultU->num_rows > 0) {
  while ($row = $resultU->fetch_array(MYSQLI_ASSOC)) {
    $tbodyU .= "
        <tr>
          <td><img class='img-thumbnail rounded-circle' style='height:50px' src='../pictures/user/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>
          <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
          <td>" . $row['birthday'] . "</td>
          <td>" . $row['email'] . "</td>
          <td>
            <a href='update.php?id=" . $row['pk_userid'] . "'><button class='btn colorBtn btn-sm' type='button'>Edit</button></a>
            <a href='block.php?id=" . $row['pk_userid'] . "'><button class='btn colorBtn text-warning btn-sm' type='button'>Block</button></a>
            <a href='delete.php?id=" . $row['pk_userid'] . "'><button class='btn colorBtn text-danger btn-sm' type='button'>Delete</button></a>
          </td>
        </tr>";
  }
} else {
  $tbodyU = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}


//Search for recipes not pending

//recipe Search Function
if (isset($_POST["recBtn"])) {
  //Was über Suchfeld kommt
  $recSearch = "%" . strip_tags($_POST["recipeSearch"]) . "%";
  echo $recSearch;

  $sqlRecipes = "SELECT * FROM recipes  WHERE status != 'pending' AND recipe_name like '$recSearch' ORDER BY recipe_name";
} else {
  $sqlRecipes = "SELECT * FROM recipes  WHERE status != 'pending' ORDER BY recipe_name";;
}


//Select all-Recipes-Button
if (isset($_POST["allRecBtn"])) {

  $sqlRecipes = "SELECT * FROM recipes  WHERE status != 'pending' ORDER BY recipe_name";
}




# list of all recipes
// $sqlRecipes = "SELECT * FROM recipes  WHERE status != 'pending'ORDER BY recipe_name";
$resultRec = mysqli_query($connect, $sqlRecipes);
$tbodyR = "";
if ($resultRec->num_rows > 0) {
  while ($rowRec = $resultRec->fetch_array(MYSQLI_ASSOC)) {
    $tbodyR .= "
      <tr>
        <td><img class='img-thumbnail rounded-circle' style='height:50px' src='../pictures/recipies/" . $rowRec['recipe_picture'] . "' alt=" . $rowRec['recipe_name'] . "></td>
        <td>" . $rowRec['recipe_name'] . "</td>
        <td>" . $rowRec['prep_time'] . "</td>
        <td>" . $rowRec['recipe_type'] . "</td>
        <td>
          <a href='../recipies/recipe_update.php?id=" . $rowRec['pk_recipeid'] . "'><button class='btn colorBtn btn-sm' type='button'>Edit</button></a>
          <a href='../recipies/recipe_delete.php?id=" . $rowRec['pk_recipeid'] . "'><button class='btn colorBtn text-danger btn-sm' type='button'>Delete</button></a>
          </td>
      </tr>";
  }
} else {
  $tbodyR = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
};



//for search in ingredients;


if (isset($_POST["ingBtn"])) {
  //Was über Suchfeld kommt
  $searchIng = "%" . strip_tags($_POST["ingSearch"]) . "%";


  $sqlIngr = "SELECT recipes.recipe_name, ingredients.pk_ingredientsid, ingredients.ingredient_name, ingredients.calories_per_unit, ingredients.unit,
  COUNT(DISTINCT recipes.pk_recipeid) as 'no. of recipies'
  from recipeingredient
  INNER join recipes on recipeingredient.fk_recipe
  INNER join ingredients on recipeingredient.fk_ingredient
  WHERE ingredients.ingredient_name LIKE '$searchIng'
  group by ingredients.ingredient_name";
  // LIMIT 10
} else {
  $sqlIngr = "SELECT recipes.recipe_name, ingredients.pk_ingredientsid, ingredients.ingredient_name, ingredients.calories_per_unit, ingredients.unit,
  COUNT(DISTINCT recipes.pk_recipeid) as 'no. of recipies'
  from recipeingredient
  INNER join recipes on recipeingredient.fk_recipe
  INNER join ingredients on recipeingredient.fk_ingredient
  group by ingredients.ingredient_name
  LIMIT 10";
}


//Select all-Ingredients-Button

if (isset($_POST["allIngBtn"])) {

  $sqlIngr = "SELECT pk_ingredientsid, ingredient_name, calories_per_unit, unit, COUNT(ri.fk_ingredient) as 'no. of recipies'  
  from recipeingredient ri 
  LEFT join ingredients i on ri.fk_ingredient = i.pk_ingredientsid 
  group by pk_ingredientsid, ingredient_name, calories_per_unit, unit ";
}


//Select lessIngredients-Button

if (isset($_POST["lessIngBtn"])) {

  $sqlIngr = "SELECT recipes.recipe_name, ingredients.pk_ingredientsid, ingredients.ingredient_name, ingredients.calories_per_unit, ingredients.unit,
  COUNT(DISTINCT recipes.pk_recipeid) as 'no. of recipies'
  from recipeingredient
  INNER join recipes on recipeingredient.fk_recipe
  INNER join ingredients on recipeingredient.fk_ingredient
  group by ingredients.ingredient_name 
  LIMIT 10";
}


$resultIngr = mysqli_query($connect, $sqlIngr);
$tbodyI = "";
if ($resultIngr->num_rows > 0) {
  while ($rowIngr = $resultIngr->fetch_array(MYSQLI_ASSOC)) {

    $ingrName = $rowIngr['ingredient_name'];

    $tbodyI .= "
      <tr>
        <td id=" . $rowIngr['ingredient_name'] . ">" . $rowIngr['ingredient_name'] . "</td>
        <td>" . $rowIngr['calories_per_unit'] . "</td>
        <td>" . $rowIngr['unit'] . "</td>
        <td>" . $rowIngr['no. of recipies'] . "</td>
        <td></td>
        <td>
          <a href='../ingredients/ingredient_update.php?id=" . $rowIngr['pk_ingredientsid'] . "'><button class='btn colorBtn btn-sm' type='button'>Edit</button></a>
          <a href='../ingredients/ingredient_delete.php?id=" . $rowIngr['pk_ingredientsid'] . "'><button class='btn colorBtn text-danger btn-sm' type='button'>Delete</button></a>
          </td>
      </tr>";
  }
} else {
  $tbodyI = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
};



//Mealplanner Date-Filter:


if (isset($_POST["dateBtn"])) {

  $dateFrom = $_POST['dateFrom'];
  $dateTo = $_POST['dateTo'];
  // echo $dateTo;
  $sqlMealPlan = "SELECT pk_weekplan, pk_userid, date, number_serv, weekplan.time, first_name, last_name, recipe_name
FROM `weekplan`
INNER JOIN `user` on fk_userid = pk_userid
INNER JOIN `recipes` on fk_recipeid = pk_recipeid WHERE date between '$dateFrom' and '$dateTo'  ORDER BY `date`";
} else {
  $sqlMealPlan = "SELECT pk_weekplan, pk_userid, date, number_serv, weekplan.time, first_name, last_name, recipe_name
  FROM `weekplan`
  INNER JOIN `user` on fk_userid = pk_userid
  INNER JOIN `recipes` on fk_recipeid = pk_recipeid ORDER BY `date`";
}
//Select all-Button

if (isset($_POST["allPlanBtn"])) {

  $sqlMealPlan = "SELECT pk_weekplan, pk_userid, date, number_serv, weekplan.time, first_name, last_name, recipe_name
FROM `weekplan`
INNER JOIN `user` on fk_userid = pk_userid
INNER JOIN `recipes` on fk_recipeid = pk_recipeid ORDER BY `date`";
}





# list of all meal planners together with user id & user name
# list of all meal planners together with user id & user name

// $sqlMealPlan = "SELECT pk_weekplan, pk_userid, first_name, last_name, date, number_serv, time FROM weekplan inner join user on fk_userid ORDER BY date";
$resultMealPlan = mysqli_query($connect, $sqlMealPlan);
$tbodyMealPlan = "";
if ($resultMealPlan->num_rows > 0) {
  while ($rowMealPlan = $resultMealPlan->fetch_array(MYSQLI_ASSOC)) {
    $tbodyMealPlan .= "
      <tr>
        <td>" . $rowMealPlan['time'] . "</td>
        <td>" . $rowMealPlan['number_serv'] . "</td>
        <td>" . $rowMealPlan['date'] . "</td>
        <td>" . $rowMealPlan['pk_userid'] . "</td>
       
        <td>" . $rowMealPlan['first_name'] . " " . $rowMealPlan['last_name'] . " </td>
        <td>
          <a href='../planner/planner_update.php?id=" . $rowMealPlan['pk_weekplan'] . "'><button class='btn colorBtn btn-sm' type='button'>Edit</button></a>
          <a href='../planner/planner_delete.php?id=" . $rowMealPlan['pk_weekplan'] . "'><button class='btn colorBtn btn-sm text-danger' type='button'>Delete</button></a>
          </td>
      </tr>";
  }
} else {
  $tbodyMealPlan = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
};

$connect->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

  <link rel="stylesheet" href="./styles.css">
  <title>Dashboard</title>
  <!-- adding CSS, Bootstrap, Fonts & Awesome Icons to file -->
  <?php require_once '../css/CSS_bootst_fonts.php' ?>
  <style>
    <?php include '../css/style.css';

    ?>.form-control-primary {
      margin: 10px;
      opacity: 0.2;
      border-radius: 2px;
    }

    .sidebar {
      position: fixed;
      left: 10 !important;
      /* left: 0; old style */
      bottom: 0;
      top: 0;
      z-index: 100;
      padding: 70px 0 0 10px;

      border-right: 1px solid #d3d3d3;
    }

    .profileStyle {
      /* <img src="https://img.icons8.com/wired/64/000000/omlette.png" /> */
      /* background-image: linear-gradient(90deg, rgba(141, 53, 51, 0.85) 40%, rgba(200, 181, 151, 1) 100%); */

      background-color: #BFAB93 !important;
      /* background:url(https://img.icons8.com/wired/64/000000/omlette.png)center; */


    }

    .left-sidebar {

      position: sticky;
      top: 0;
      height: calc(100vh - 70px);

    }

    .sidebar-nav li .nav-link {
      color: #333;
      font-weight: 500;

    }

    main {
      padding-top: 90px;

    }

    main .card {
      margin-bottom: 20px;
    }

    .navbar-brand {
      margin: 10px;
    }
  </style>

  <title>Dashboard</title>
</head>

<body>




  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 d-none d-md-block sidebar">
        <div class="left-sidebar">
          <ul class="nav flex-column sidebar-nav">
            <li class="nav-item">
              <a class="nav-link active text-center" href="#">
                <img src="../pictures/user/avatar.png" alt="" class="rounded-circle mb-3" style="height:100px">

                <h3>Welcome Admin!</h3>
                <!-- <img width="20%" style="color:antiquewhite" src="https://img.icons8.com/wired/64/000000/omlette.png" /> -->

                <div>
              </a>
            </li>
            <!-- Sign out -->
            <li class="nav-item text-center">
              <a href="logout.php?logout" type="button" class="btn btn-warning mb-5">Sign out</a></a>
            </li>
            <hr>
            <!-- Home -->
            <li class="nav-item">
              <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd" />
              </svg><a href="../home.php" type="button" class="btn text-secondary fs-5">Home</a></a>
            </li>
            <hr>
            <!-- users -->
            <li class="nav-item">
              <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd" />
              </svg><a href="#users" type="button" class="btn text-secondary fs-5">Users</a></a>
            </li>
            <hr>
            <!-- Recipes -->
            <li class="nav-item">
              <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd" />
              </svg><a href="#recipies" type="button" class="btn text-secondary f-5">Recipes</a></a>
            </li>
            <hr>
            <!-- Ingredient -->
            <li class="nav-item">
              <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd" />
              </svg><a href="#ingredients" type="button" class="btn text-secondary f-5">Ingredients</a>
            </li>
             <hr>
            <!-- Meal planner -->
            <li class="nav-item">
              <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd" />
              </svg><a href="#mealplans" type="button" class="btn text-secondary f-5">Meal planner</a>
            </li>
            <hr>
          </ul>
        </div>
      </div>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <!-- pending -->
        <h2>Recipes Pending</h2>

        <div id="recipies" class="tableColor2 mb-5 table-responsive">
          <table class="table table-light">
            <thead>
              <tr>

                <th scope="col">Picture</th>
                <th scope="col">Name</th>
                <th scope="col">Prep time</th>
                <th scope="col">Recipe type</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              <?= $tbodypen ?>
            </tbody>
          </table>
        </div>
        <!-- User -->
        <h2>User</h2>

        <div id="users" class="tableColor2 mb-5 table-responsive">
          <table class="table table-light">
            <thead>
              <form action="dashboard.php#users" method="post" enctype="multipart/form-data">
                <td><input class="form-control" type="text" name="userSearch" placeholder="Enter Last Name"></td>
                <td><button class='btn  colorBtn text-success btn-sm m-2 text-end' type="submit" name="userBtn" type="submit">Search</button>
                  <button class='btn  colorBtn text-danger btn-sm m-2' name="allUserBtn" type="submit">Show all</button>
                </td>
                <th></th>
                <th></th>
                <th></th>
              </form>
            </thead>

           
            <thead>
              <tr>
                <th scope="col">Picture</th>
                <th scope="col">Name</th>
                <th scope="col">Date of birth</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?= $tbodyU ?>
            </tbody>
          </table>



        </div>
        <!-- Recipes -->
        <h2>Recipes</h2>

        <div id="recipies2" class="tableColor2 mb-5 table-responsive">
          <table class="table table-light">
            <thead>
              <form action="dashboard.php#recipies2" method="post" enctype="multipart/form-data">
                <td><input class="form-control" type="text" name="recipeSearch" placeholder="Enter Recipe Name"></td>
                <td><button class='btn colorBtn text-success btn-sm text-end' type="submit" name="recBtn" type="submit">Search</button>
                  <button class='btn colorBtn text-danger btn-sm  ms-1' name="allRecBtn" type="submit">Show all</button>
                </td>
                <th></th>
                <th></th>
                <th></th>
                <thead>
              </form>
          
              <thead>
                <tr>

                  <th scope="col">Picture</th>
                  <th scope="col">Name</th>
                  <th scope="col">Prep time</th>
                  <th scope="col">Recipe type</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
            <tbody>
              <?= $tbodyR ?>
            </tbody>
          </table>
        </div>

        <!-- Ingredeint -->
        <h2>Ingredient</h2>

        <div id="ingredients" class="tableColor2 mb-5 table-responsive">
          <table class="table table-light">
            <thead>
              <form action="dashboard.php#ingredients" method="post" enctype="multipart/form-data">
                <td><input class="form-control" type="text" name="ingSearch" placeholder="Enter Ingredient"></td>
                <td><button class='btn colorBtn text-success btn-sm' type="submit" name="ingBtn" type="submit">Search</button>
                <button class='btn  colorBtn text-danger btn-sm  ms-1' name="allIngBtn" type="submit">Show all</button>
                <button class='btn  colorBtn text-warning btn-sm  ms-1' name="lessIngBtn" type="submit">Show less</button></td>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </form>
            </thead>
            <thead>
              <tr>

                <th scope="col">Name</th>
                <th scope="col">Calories/unit</th>
                <th scope="col">Unit</th>
                <th scope="col">Count of recipes</th>
                <th scope="col"></th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              <?= $tbodyI ?>
            </tbody>
          </table>
        </div>
        <!-- Meal planner -->
        <h2>Meal planner</h2>
        <form action="dashboard.php#mealplans" method="post" enctype="multipart/form-data">
          <table class='table  table-light table-hover'>
            <thead>


              <tr>
                <td><input class="form-control" type="date" name="dateFrom" /></td>
                <td><input class="form-control" type="date" name="dateTo" /></td>
                <td><button class='btn colorBtn text-success btn-sm' name="dateBtn" type="submit">Select period</button>
                  <button class='btn colorBtn text-danger btn-sm  ms-1' name="allPlanBtn" type="submit">Select all</button>
                </td>
              </tr>
              <th></th>
                <th></th>
                <th></th>
            </thead>
          </table>
        </form>
        <div id="mealplans" class="tableColor2 mb-5 table-responsive">
          <table class="table table-light">
            <thead>
              <tr>

                <th scope="col">Time of day</th>
                <th scope="col">No. of serv</th>
                <th scope="col">Date</th>
                <th scope="col">User id</th>
                <th scope="col">User Name</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              <?= $tbodyMealPlan ?>
            </tbody>
          </table>
        </div>

      </main>
    </div>
  </div>

  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>

</body>

</html>