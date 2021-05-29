<?php

# file where a user can edit his/her own recipe
# admin can edit any recipe

# displaying only ONE recipe in a table/form
# the table/form grabs data from the DB for this specific recipe & displays it
# user can see the recipe with img, preparation time, ingredients, meal description, prep time, calories...
# updating also the recipe/meal type (i.e. paleo, vegetarian, vegan, etc.)

# when user clicks on "Save changes" button -- the recipe will be updated
# confirmation alert will be displayed
# when user clicks on "go back" button -- he/she will be re-directed to recipies.php
session_start();
require_once '../components/db_connect.php';
require_once '../components/file_upload.php';
require_once '../components/sessions.php';
//fetch and populate form
$ingredients = "";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM recipes Where pk_recipeid = {$id}";
  $result = $connect->query($sql);
  if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
    $recipe_name = $data['recipe_name'];
    $fk_userid = $data['fk_userid'];
    $prep_steps = $data['prep_steps'];
    $prep_time = $data['prep_time'];
    $calories = $data['calories'];
    $recipe_type = $data['recipe_type'];
    $recipe_picture = $data['recipe_picture'];
    if (isset($_SESSION["user"])) {
      if ($_SESSION['user'] != $fk_userid) {
        header("Location:../error.php");
      }
    }
  }
  $result2 = mysqli_query($connect, "SELECT * FROM ingredients ORDER BY ingredient_name");
  while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
    $sqlcheck = "SELECT * FROM recipeingredient WHERE fk_recipe = $id AND fk_ingredient = {$row['pk_ingredientsid']}";
    $dbcheck = $connect->query($sqlcheck);
    if ($dbcheck->num_rows == 1) {
      $datacheck = $dbcheck->fetch_assoc();
      $ingredients .= "<div class='d-flex'><input type='checkbox' checked='checked' name='fk_ingredient[]' value='{$row['pk_ingredientsid']}'/> 
      {$row['ingredient_name']}<br /></div>";
    } else {
      $ingredients .= "<div class='d-flex'><input type='checkbox' name='fk_ingredient[]' value='{$row['pk_ingredientsid']}'/> 
      {$row['ingredient_name']}<br /></div>";
    }
  }
} else {
  header("Location:../error.php");
}



$message = '';
//update
$class = 'd-none';
if ($_POST) {
  $recipe_name = $_POST['recipe_name'];
  $prep_steps = $_POST['prep_steps'];
  $prep_time = $_POST['prep_time'];
  $recipe_type = $_POST['recipe_type'];
  $fk_ingredient = $_POST['fk_ingredient'];
  $recipeid = $_POST['pk_recipeid'];
  $calories = $_POST['calories'];
  $uploadError = '';
  $pictureArray = file_upload_recipe($_FILES['recipe_picture']); //file_upload() called
  $picture = $pictureArray->fileName;
  if ($pictureArray->error === 0) {
    ($_POST['recipe_picture'] == "meal.jpeg") ?: unlink("../pictures/recipies/{$_POST['recipe_picture']}");
    $sql = "UPDATE recipes SET
       recipe_name='$recipe_name',
       prep_steps='$prep_steps',
       prep_time=$prep_time,
       recipe_type ='$recipe_type',
       calories = $calories,
       recipe_picture ='$pictureArray->fileName'
        WHERE pk_recipeid = $recipeid";
  } else {
    $sql = "UPDATE recipes SET
       recipe_name='$recipe_name',
       prep_steps='$prep_steps',
       prep_time=$prep_time,
        calories = $calories,
       recipe_type ='$recipe_type'
        WHERE pk_recipeid = $recipeid";
  }
  if ($connect->query($sql) === true) {
    $sqlri = "DELETE FROM recipeingredient WHERE fk_recipe =" . $recipeid;
    if ($connect->query($sqlri) === true) {
      $sqlloop = "INSERT INTO recipeingredient( fk_recipe,fk_ingredient) 
      VALUES (" . $recipeid . ",?);";
      $stmt = $connect->prepare($sqlloop);
      foreach ($fk_ingredient as $key => $val) {
        $stmt->bind_param('s', $fk_ingredient[$key]);
        $stmt->execute();
      }
    } else {
      echo $sqlloop = "INSERT INTO recipeingredient( fk_recipe,fk_ingredient,ingredient_quantity) 
          VALUES (" . $recipeid . ",?,?);";
    }
    $class = "alert alert-success";
    $message = "The record was successfully updated";
    $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
    header("refresh:3;url=recipe_update.php?id={$id}");
  } else {
    $class = "alert alert-danger";
    $message = "Error while updating record : <br>" . $connect->error;
    $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
    header("refresh:3;url=update.php?id={$id}");
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
  <!--Tinymce-->
  <script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: "textarea",
      toolbar: "fontsizeselect",
      fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor"
      ],
      toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      toolbar2: "print preview media | forecolor backcolor emoticons font_formats",
    });
  </script>
  <!-- adding CSS, Bootstrap, Fonts & Awesome Icons to file -->
  <?php require_once '../css/CSS_bootst_fonts.php' ?>
  <style>
    <?php include '../css/style.css'; ?>
  </style>
  <style>
    fieldset {
      margin: auto;
      margin-top: 100px;
      width: 60%;
    }
  </style>

  <title>Edit recipe <?= $recipe_name ?></title>
</head>

<body>
  <!-- Navbar Start-->
  <?php require_once '../sections/navbar.php'; ?>
  <!-- Navbar End-->

  <fieldset>
    <div class="<?php echo $class; ?>" role="alert">
      <p><?php echo ($message) ?? ''; ?></p>
    </div>

    <div class="container">
      <h2 class='h2'>Edit recipe <?= $recipe_name ?> </h2>

      <form method="post" enctype="multipart/form-data">
        <table class='table tableColor table-hover'>
          <th><img class='img-thumbnail ' src='../pictures/recipies/<?php echo $recipe_picture ?>' alt="<?php echo $recipe_name ?>"></th>

          <tr>
            <th>Recipe Title</th>
            <td><input class='form-control' type="text" name="recipe_name" placeholder="Recipe Name" value="<?= $recipe_name ?>" /></ td>
          </tr>
          <tr>
            <th>Recipe Type</th>
            <td>
              <select name="recipe_type" class='form-control' aria-label="Default select example">
                <option> Flexitarian </option>
                <option> Vegetarian </option>
                <option> Vegan </option>
                <option selected value='none'> <?= $recipe_type ?> </option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Preparation steps</th>
            <td><textarea class='form-control' name="prep_steps" id="" cols="30" rows="5" value="<?= $prep_steps ?>"></textarea></td>
            <!-- Kennt einer da eine Lösung?? -->
          </tr>
          <tr>
            <th> Preparation Time </th>
            <td><input class='form-control' type="number" step="any" name="prep_time" value="<?= $prep_time ?>" /></td>
          </tr>
          <tr>
            <th> Calories per Serving </th>
            <td><input class='form-control' type="number" step="any" name="calories" value="<?= $calories ?>" /></td>
          </tr>
          <input type="hidden" name="pk_recipeid" value="<?= $id ?>">
          <input type="hidden" name="recipe_picture" value="<?= $recipe_picture ?>">
          <tr>
            <td colspan="2">
              <div class="container">
                <div class="row row-cols-lg-4 row-cols-md-2 fs-6 fw-light">
                  <?php echo $ingredients; ?>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <th>Picture</th>
            <td> <input class='form-control' type="file" name="recipe_picture" /></td>
          </tr>
          <td><button class='btn colorBtn text-success px-3' type="submit"> Update Recipe </button></td>
          <td><a href="recipies.php"><button class='btn colorBtn text-dark' type="button"> Home </button></a></td>
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