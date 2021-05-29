<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/sessions.php';


if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM weekplan WHERE pk_weekplan = {$id}";
  // echo $sql;
  $result = $connect->query($sql);
  if ($result->num_rows == 1) {
      $data = $result->fetch_assoc();
      $recipe = $data['fk_recipeid'];
      $user = $data['fk_userid'];
      // $week = $data['week'];Woche wird aus Datum geholt
      $date = $data['date'];
      $servings= $data['number_serv'];
      $mealtime= $data['time'];
      // $image = $data['image'];
   if (isset($_SESSION["user"])) {
      if($_SESSION['user'] != $user ){
     header("Location:../error.php");}
    }
      $resultRecipe = mysqli_query($connect, "SELECT * FROM recipes");
      $recipeList = "";
      if(mysqli_num_rows($resultRecipe) > 0){
         while ($row = $resultRecipe->fetch_array(MYSQLI_ASSOC)){
             if($row['pk_recipeid'] == $recipe){
                 $recipeList .= "<option selected value='{$row['pk_recipeid']}'>{$row['recipe_name']}</option>";  
             }else {
                 $recipeList .= "<option value='{$row['pk_recipeid']}'>{$row['recipe_name']}</option>";
             }}                
         }
    //      else{
    //      $recipeList = "<li>Recipe is not known</li>";
    //  }

     

      // $resultTime = mysqli_query($connect, "SELECT * FROM weekplan");
     
      // $timeList = "";
      // if(mysqli_num_rows($resultTime) > 0){
      //   while ($row = $resultTime->fetch_array(MYSQLI_ASSOC)){
      //       if($row['time'] == $mealtime){
      //           $timeList .= "<option selected value='{$row['time']}'>{$row['time']}</option>";  
      //       }else {
      //           $timeList .= "<option value='{$row['time']}'>{$row['time']}</option>";
      //       }}                
      //   }


  } else {
      header("location: ../error.php");
  }
  $connect->close();
} else {
  header("location: ../error.php");
}


  # file where a user can edit his/her meal plan
    # admin can edit any meal plan

  # displaying only ONE meal plan in a table/form
    # the table/form grabs data from the DB for this specific meal plan & displays it
    
  # when user clicks on "Save changes" button -- the meal plan will be updated
    # confirmation alert will be displayed
  # when user clicks on "go back" button -- he/she will be re-directed to ../user/profile.php

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

  <title>Edit your mealplan</title>
</head>
<body>

  <!-- Navbar Start-->
    <?php require_once '../sections/navbar.php'; ?>
  <!-- Navbar End-->

  <!-- here is place to display & update ONE meal plan in the browser -->
  <div class="container p-5">
  <fieldset>
            <h2 class='h2 mb-2'>Edit Mealplan</h2>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table tableColor  table-hover">
                  	<tr>
                        <th>Recipe</th>
                        <td>
                        <select select class = "form-select"   name = "recipe"   aria-label = "Default select example" >
                            <?php   echo  $recipeList; ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td><input class="form-control" type="date"  name="date" placeholder ="Date" value="<?php echo $date ?>"  /></td>
                    </tr>
                    <tr>
                        <th>Servings</th>
                        <td><input class="form-control" type= "number" name="servings" step="any" min="0" placeholder="Servings" value ="<?php echo $servings ?>" /></td>
                    </tr>
                  	<tr>
                        <th>Mealtime</th>
                        <td>
                        <select select class = "form-select"   name = "time"   aria-label = "Default select example" >
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <input type= "hidden" name= "weekplanId" value= "<?php echo $data['pk_weekplan'] ?>" />
                        <td><button class="btn colorBtn" type= "submit">Save Changes</button></td>
                        <td><a href= "planner.php"><button class="btn colorBtn text-warning" type="button">All Entries</button></a></td>
                    </tr>
                </table>
            </form>
          </div>
        </fieldset>

<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>
</body>
</html>