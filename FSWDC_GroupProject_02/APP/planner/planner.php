<?php   
session_start();
require_once '../components/db_connect.php';
require_once '../components/sessions.php';



if ($_POST) {   
  $dateFrom = $_POST['dateFrom'];
  $dateTo = $_POST['dateTo'];

  $sql = "SELECT pk_weekplan, date, number_serv, weekplan.time, first_name, last_name, recipe_name
FROM `weekplan`
INNER JOIN `user` on fk_userid = pk_userid
INNER JOIN `recipes` on fk_recipeid = pk_recipeid WHERE date between '$dateFrom' and '$dateTo'  ORDER BY `date`";

}else {
  $sql = "SELECT pk_weekplan, date, number_serv, weekplan.time, first_name, last_name, recipe_name
FROM `weekplan`
INNER JOIN `user` on fk_userid = pk_userid
INNER JOIN `recipes` on fk_recipeid = pk_recipeid ORDER BY `date`";
}






$result = mysqli_query($connect ,$sql);
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)  > 0) {    
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){        #image in tbody einfügen (siehe ganz unten)

    //to display only weekday for date:
    $date = DateTime::createFromFormat('Y-m-d', $row['date']);

       $tbody .= "<tr>

            
            <td>" .$row['first_name']." ".$row['last_name']."</td>
            
            <td>" .$date->format('W')."</td>            
            <td>" .$date->format('l')."</td>
            <td>" .$row['recipe_name']."</td>
            <td>" .$row['number_serv']."</td>
            <td>" .$row['time']."</td>

   
            <td><a href='planner_update.php?id=" .$row['pk_weekplan']."'><button class='btn colorBtn btn-sm' type='button'>Edit</button></a>
            <a href='planner_delete.php?id=" .$row['pk_weekplan']."'><button class='btn text-danger colorBtn btn-sm' type='button'>Delete</button></a><a href='planner_details.php?id=" .$row['pk_weekplan']."'><button class='btn colorBtn btn-sm text-warning  ms-1' type='button'>Details</button></a></td>

           </tr>";
   };
} else {
   $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

$connect->close();




  # file where all planners are displayed on a single page
    # user can browse through other users' meal planners but can't edit or delete them
    # they can be displayed as a table/form

    # add filter for planner by daytime (lunch, breakfast, dinner) and/or meal type (vegeterian, paleo, etc.) ?

    # when user clicks on "details" -- he/she is redirected to ingredient-details.php
    # when user clicks on "go back" -- he/she is redirected to ../user/profile.php

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
    .img-thumbnail{
           
            height: 70px !important;
       }
       td
       {
           text-align: left;
           vertical-align: middle;
       }
       tr
       {
           text-align: center;
       }
  </style>
  
  <title>Mealplans</title>
</head>
<body>

  <!-- Navbar Start-->
  <?php require_once '../sections/navbar.php'; ?>
  <!-- Navbar End-->
  
<div class="container p-5">
  <!-- here is place to display all weekplans in the browser as a table ?-->
    
          
           <h2 class='h2'>Meal Planner</h2>
           <form action="planner.php" method= "post" enctype="multipart/form-data">
            <table class='table tableColor  table-hover'>
                    <tr>
                        <td><input class="form-control" type="date"  name="dateFrom" /></td>
                        <td><input class="form-control" type="date"  name="dateTo" /></td>
                        <td><button class='btn colorBtn btn-sm' type="submit">Select period</button><a href='planner.php'><button class='btn colorBtn text-danger btn-sm  ms-1' type='button'>Select all</button></a></td>
                    </tr>

            </table>
            </form> 
            <table class='table tableColor  table-hover'>
            
 
               <thead class='table  table-light' >
               <tr>
               <th><a href= "planner_create.php"><button class='btn text-light colorBtn'type = "button" >Add Mealplanner</button></a></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                      
                      
                   </tr>
                   
                   <tr>
                       <th>User</th>
                       <!-- <th>Year</th> aus Platzgründen entfernt --> 
                       <th>Week</th>
                       <th>Weekday</th>
                       <th>Recipe</th>
                       <th>Servings</th>
                       <th>Mealtime</th>
                       <th></th>
                       
                   </tr>
               </thead>
               <tbody>
                <?= $tbody;?>
            </table>
       
       </div>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->

  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>
</body>
</html>
<!-- für File-Uploader ca.Zeile 11
<td><img class='img-thumbnail' src='pictures/" .$row['picture']."'</td> -->