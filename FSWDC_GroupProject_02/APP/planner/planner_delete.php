<?php
session_start();
require_once '../components/db_connect.php';

if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT weekplan.fk_userid, fk_recipeid, date, WEEK(date,1), number_serv, recipe_name, recipe_picture 
     # WEEK(date,1), select weekno. starting with Monday(1)
     FROM weekplan 
     INNER JOIN recipes ON fk_recipeid = pk_recipeid
     WHERE pk_weekplan = {$id}";
  $result = $connect->query($sql);
  $data = $result->fetch_assoc();
  if ($result->num_rows == 1) {
    $user = $data['fk_userid'];
    $recipe = $data['fk_recipeid'];
    $date = $data['date'];
    # WEEK(date,1), select weekno. starting with Monday(1) 
    $week = $data['WEEK(date,1)'];
    $servings = $data['number_serv'];
    $recipe_name = $data['recipe_name'];
    $picture = $data['recipe_picture'];
    if (isset($_SESSION["user"])) {
      if ($_SESSION['user'] != $user) {
        header("Location:../error.php");
      }
    }

    //to display only weekday for date:
    $dateF = DateTime::createFromFormat('Y-m-d', $date);
  } else {
    header("location: ../error.php");
  }
  $connect->close();
} else {
  header("location: ../error.php");
}
# file where a user can delete his/her own meal plan
# user can see only his/her own meal plan
# admin can delete any meal plan

# "confirmation of delete" page
# displaying only ONE meal plan in a table/form

# when user clicks on delete "Yes, delete" button -- the meal plan will be deleted
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
    <?php include '../css/style.css'; ?>fieldset {
      margin: auto;
      margin-top: 100px;
      width: 70%;
    }

    .img-thumbnail {
      width: 90px !important;
      /* height: 70px !important; */
    }
  </style>

  <title>Delete your mealplan</title>
</head>

<body>
  <!-- Navbar Start-->
  <?php require_once '../sections/navbar.php'; ?>
  <!-- Navbar End-->

  <!-- here is place to display ONE meal plan by its id which should be deleted -->

  <fieldset>
    <div class="container p-5">
      <h2 class='h2 mb-2'> Delete request</h2>

      <table class="table tableColor  table-hover">
        <thead class='table  table-light'>
          <tr>
            <th>You have selected this data: </th>

            <th><?php echo   $recipe_name ?></th>
            <th>week <?php echo   $week ?></th>
            <th><?php echo   $dateF->format('l') ?></th>
            <th><img src='../pictures/recipies/<?php echo $picture ?>' alt="<?php echo $recipe ?>"></th>
          </tr>
        </thead>
        <thead class='table'>
          <th>
            <h3 class="mb-4">Do you really want to delete this recipe?</h3>
          </th>
        </thead>



        <form action="actions/a_delete.php" method="post">
          <th><input type="hidden" name="id" value="<?php echo $id ?>" /></th>


          <!-- <input type="hidden"  name="picture"  value="<?php echo $picture ?>"/> -->
          <th><button class="btn colorBtn text-danger" type="submit"> Yes, delete it! </button></th>
          <th></th>
          <th></th>

          <th><a href="planner.php"><button class="btn colorBtn text-warning" type="button"> No, go back! </button></a></th>
          <th></th>



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