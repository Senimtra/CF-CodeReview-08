<?php

# details page for each recipe by its id
# displaying only ONE recipe
# user can see a recipe with img, preparation time, ingredients, meal description, prep time, calories
# user can see other users' recipies
# user can see his/her own recipe
# when a user clicks on "edit recipe" button he/she will be re-directed to recipe-update.php
# when user clicks on "delete recipe" button he/she will be re-directed to recipe-delete.php
# when a user clicks on "go back" button -- he/she will be re-directed to recipies.php
session_start();
require_once '../components/db_connect.php';
require_once '../components/file_upload.php';
require_once '../components/sessions.php';
//fetch and populate form
$session_user = $userid;
$buttonscol = '';
$ingredients = "";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM recipes r INNER JOIN user u ON u.pk_userid = r.fk_userid  Where pk_recipeid = {$id}";
  $result = $connect->query($sql);
  if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
    $recipe_name = $data['recipe_name'];
    $fk_userid = $data['fk_userid'];
    $prep_steps = $data['prep_steps'];
    $prep_time = $data['prep_time'];
    $recipe_type = $data['recipe_type'];
    $recipe_picture = $data['recipe_picture'];
    $user_name = $data['first_name'];
    if ($session_user == $fk_userid) {
      $buttonscol = "<div class='d-flex justify-content-end'><a href='recipies.php'><button class ='btn colorBtn text-warning px-3 me-2'> Go back </button></a><button class='btn colorBtn text-success me-2'><a href='recipe_update.php?id=" . $data['pk_recipeid'] . "'>Update</a></button><button class='btn colorBtn text-danger me-2'><a href='recipe_delete.php?id=" . $data['pk_recipeid'] . "'>Delete</a></button></div>";
    } else {
      $buttonscol = "<a href='recipies.php'><button class ='btn colorBtn text-warning  px-3'>Go back</button></a>";
    }
  }
  $result2 = mysqli_query($connect, "SELECT * FROM ingredients i INNER JOIN recipeingredient ri ON i.pk_ingredientsid = ri.fk_ingredient");
  while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
    $sqlcheck = "SELECT * FROM recipeingredient WHERE fk_recipe = $id AND fk_ingredient = {$row['pk_ingredientsid']}";
    $dbcheck = $connect->query($sqlcheck);
    if ($dbcheck->num_rows == 1) {
      $datacheck = $dbcheck->fetch_assoc();
      $ingredients .= "
      <a style='color:darkgrey;text-decoration:underline' class='fs-6 fw-light fst-italic' href='../ingredients/ingredient_details.php?id={$row['pk_ingredientsid']}'>{$row['ingredient_name']}</a> ";
    }
  }
} else {
  header("Location:../error.php");
}
$message = '';
$ratingpost = '';
$sqlrating = "SELECT * FROM rating WHERE fk_userid = $session_user AND fk_recipeid = {$id} ";

$ratingresult = $result = $connect->query($sqlrating);
if ($ratingresult->num_rows == 1) {
  $ratingdata = $ratingresult->fetch_assoc();
  $rating = $ratingdata['rating'];
  if ($_POST) {
    $ratingpost = $_POST['rating'];
    $rate = "UPDATE rating SET rating = $ratingpost WHERE fk_userid = $session_user AND fk_recipeid = {$id}";
    if ($connect->query($rate) === TRUE) {
      $class = "success";
      $message = "You rated this recipe!";
      header("refresh:3;url=recipe_details.php?id={$id}");
    } else {
      $class = "danger";
      $message = "Error while updating ingredient: <br>" . $connect->error;
    }
  }
} else {
  $rating = 2.5;
  if ($_POST) {
    $ratingpost = $_POST['rating'];
    $rate = "INSERT INTO rating (fk_userid, fk_recipeid, rating) VALUES ('$userid', '$id', $ratingpost)";
    if ($connect->query($rate) === TRUE) {
      $class = "success";
      $message = "You rated this recipe!";
      header("refresh:2;url=recipe_details.php?id={$id}");
    } else {
      $class = "danger";
      $message = "Error while updating ingredient: <br>" . $connect->error;
    }
  }
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
  <title>Details for <?= $recipe_name ?> </title>
</head>

<body>
  <!-- Navbar Start-->
  <?php require_once '../sections/navbar.php'; ?>
  <!-- Navbar End-->

  <div class="<?php echo $class; ?>" role="alert">
    <p><?php echo ($message) ?? ''; ?></p>
  </div>

  <!-- here is place to display only ONE recipe by its id in the browser -->
  <div class="container p-5">

    <h2 class='h2'> <?= $recipe_name ?> - Created by <?= $user_name ?> </h2>

    <table class='table tableColor table-striped'>
      <th colspan="2"><img src='../pictures/recipies/<?php echo $recipe_picture ?>' alt="<?php echo $recipe_name ?>"></th>


      <tr>
        <th>Recipe Type</th>
        <td>
          <?= $recipe_type ?> </td>
      </tr>
      <tr>
        <th>Preparation steps</th>
        <td><?= $prep_steps ?></td>
        <!-- Kennt einer da eine Lösung?? -->
      </tr>
      <tr>
        <th> Preparation Time </th>
        <td><?= $prep_time ?></td>
      </tr>
      <th> Ingredients </th>
      <td>
        <?php echo $ingredients; ?>
      </td>
      </tr>

      <tr>
        <th class="text-nowrap">Would you recommend it?</th>
        <form method="post" enctype="multipart/form-data">
          <td>
            <div class="d-flex justify-content-between">
              <div class="card p-3" style="width: 50%">
                <div class="d-flex justify-content-between">
                  <label class="form-label"> Not likely </label>
                  <div>
                    Very likely
                  </div>
                </div>
                <input type="range" class="form-range" name='rating' min=1 max=5 step="0.5" value=<?= $rating ?>>
                <button class="btn colorBtn text-success px-3" type="submit"> Submit </button>
              </div>
              <div class="">
                <?= $buttonscol ?>
              </div>
            </div>
          </td>

        </form>
  </div>

  </tr>
  <tr>
    <td colspan="3">

    </td>
  </tr>
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