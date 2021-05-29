<?php

# file where a user can delete his/her own recipe -- individual session
# admin can delete any recipe 

# "confirmation of delete" page
# displaying only ONE recipe in a table/form
# user can see a recipe with img, preparation time, ingredients, meal description, prep time, calories...

# when user clicks on delete "Yes, delete" button -- the recipe will be deleted
# when user clicks on "go back" button -- he/she will be re-directed to recipies.php
session_start();
require_once '../components/db_connect.php';
$class = 'd-none';
if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM recipes WHERE pk_recipeid= {$id}";
  $result = $connect->query($sql);
  $data = $result->fetch_assoc();
  if ($result->num_rows == 1) {
    $recipe_name = $data['recipe_name'];
    $recipe_type = $data['recipe_type'];
    $picture = $data['recipe_picture'];
    if (isset($_SESSION["user"])) {
      if($_SESSION['user'] != $fk_userid ){
     header("Location:../error.php");}
    }
  }
}
//the POST method will actually delete the user permanently
$message = '';
if ($_POST) {
  $id = $_POST['id'];
  $picture = $_POST['recipe_picture'];
  $picture =="meal.jpeg"?: unlink("../pictures/recipies/$picture");

  $sql = "DELETE FROM recipes WHERE pk_recipeid= {$id}";
  $delete = "DELETE FROM weekplan WHERE fk_recipeid = {$id}";
  if ( $connect->query($delete) === TRUE && $connect->query($sql) === TRUE) {
    $class = "alert alert-success";
    $message = "Successfully Deleted!";
    header("refresh:3;url=../home.php");
  } else {
    $class = "alert alert-danger";
    $message = "The entry was not deleted due to: <br>.";
    $connect->error;
  }
}


$connect->close();


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
    <?php include '../css/style.css';
    ?>
  </style>

  <title>Delete recipe <?= $recipe_name ?></title>
</head>

<body>
  <!-- Navbar Start-->
  <?php require_once '../sections/navbar.php'; ?>
  <!-- Navbar End-->

  <!-- here is place to display ONE recipe by its id which should be deleted -->
  <div class="<?php echo $class; ?>" role="alert">
    <p><?php echo ($message) ?? ''; ?></p>
  </div>
  <div class="container p-5">
    <fieldset>
      <h2 class='h2'>Delete request</h2>



      <table class="table tableColor  table-hover">
        <thead class='table  table-light'>
          <th>
            <h4>You have selected this data:</h4>
          </th>
          <th></th>


          <th><?php echo "$recipe_name" ?></th>
          <th><?php echo "$recipe_type" ?></th>
          <th><img class='img-thumbnail ' src='../pictures/recipies/<?php echo $picture ?>' alt="<?php echo $recipe_name ?>"></th>
        </thead>
        <thead class='table'>
          <th>
            <h3 class="mb-4">Do you really want to delete this recipe?</h3>
          </th>
        </thead>

        <form method="post">

          <th><input type="hidden" name="id" value="<?php echo $id ?>" /></th>

          <th><input type="hidden" name="recipe_picture" value="<?php echo $picture ?>" /></th>
           <th><button class="btn  colorBtn text-danger" type="submit">Yes, delete it!</button></th>
         <th></th>
          <th><a href="../home.php"><button class="btn  colorBtn text-warning" type="button">No, go back !</button></a></th> 

         




        </form>


      </table>
  </div>
  </fieldset>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>
</body>

</html>