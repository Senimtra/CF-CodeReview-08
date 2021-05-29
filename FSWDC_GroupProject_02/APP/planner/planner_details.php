<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/sessions.php';

  # details page for a meal plan -- individual session
    # displaying only ONE meal plan
      # user can't see other people's meal plans
      # user can see his/her own meal plan

    # when a user clicks on a button he/she will be re-directed to edit & delete page for this specific meal plan
    # when user clicks on "go back" button -- he/she will be re-directed to ../user/profile.php

if ($_GET['id']) {
    $id = $_GET['id'];
    // echo $id;
    $sql = "SELECT pk_userid, weekplan.fk_recipeid, date, number_serv, time, first_name, last_name, recipes.recipe_name, recipes.recipe_picture
    FROM weekplan 
    INNER JOIN user on fk_userid = pk_userid
    INNER JOIN recipes on fk_recipeid = pk_recipeid WHERE pk_weekplan = {$id}";
    $result = $connect->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $user = $data['pk_userid'];
        $recipe = $data['fk_recipeid'];
        $date = $data['date'];
        $servings = $data['number_serv'];
        $mealtime = $data['time']; 
        $fname = $data['first_name']; 
        $lname = $data['last_name'];
        $recipeName = $data['recipe_name'];
        $picture = $data['recipe_picture'];

        

        $date = DateTime::createFromFormat('Y-m-d', $date);

        $table = "
        <tr>
            <th>User</th>
            <td>" .$fname." ". $lname."</td>
        </tr>    
        <tr>
            <th>Week</th>
            <td>" .$date->format('W')."</td>
        </tr>
        <tr>
            <th>Weekday</th>
            <td>" .$date->format('l')."</td>
        </tr>
        <tr>
        <th>Date</th>
        <td>" .$date->format('d.m.Y')."</td>
    </tr>
        <tr>
            <th>Recipe</th>
            <td class='pb-5 text-decoration-underline'> <a href='../recipies/recipe_details.php?id=" .$id."'>" .$recipeName." </a></td>
        </tr>
        <tr>
            <th>Mealtime</th>
            <td class='pb-5'>" .$mealtime."</td>
        </tr>
        <tr>
            <th>No. of Servings</th>
            <td>" .$servings."</td>
        </tr>
        <tr>
        <th></th>
        <td><a href='planner.php'><button class='btn colorBtn text-warning btn-sm' type='button'>Back to all Entries</button></a></td>
        </tr>";

    } 
    else {
        header("location: ../error.php");
    }
    $connect->close();
} 
else {
    header("location: ../error.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- adding CSS, Bootstrap, Fonts & Awesome Icons to file -->
  <?php require_once '../css/CSS_bootst_fonts.php' ?>
  <style>
    <?php include '../css/style.css'; ?>
  </style>

  <title>Details for your mealplan</title>
</head>
<body>

    <!-- Navbar Start-->
    <?php require_once '../sections/navbar.php'; ?>
    <!-- Navbar End-->

  <!-- here is place to display only ONE meal plan by its id in the browser -->

        <fieldset>
        <div class="container p-5">
            <h2 class='h1'>Mealplan Entry</h2>
            <form action="planner_details.php"  method="post" enctype="multipart/form-data">
            <table class="table tableColor table-hover">
                
                 <td><?php echo "<img class='mb-5 img-fluid' src='../pictures/recipies/" .$picture."' alt=".$recipeName." title=".$recipeName."";?></td>
                

               
                <?php echo $table;?>
               
                </table>
            </form>
            </div>
        </fieldset>


        <!--Footer-component-->

<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
        


  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>
</body>
</html>