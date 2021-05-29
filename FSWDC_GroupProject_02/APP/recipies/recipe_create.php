<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/file_upload.php';
require_once '../components/sessions.php';
$ingredients = "";
$result = mysqli_query($connect, "SELECT * FROM ingredients ORDER BY ingredient_name");
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $ingredients .= "
  <div class='d-flex'>
  <input type='checkbox' name='fk_ingredient[]' value='{$row['pk_ingredientsid']}'/><div class='ms-1'>{$row['ingredient_name']}</div> 
  </div>";
}

$message = '';
$message2 = '';
if ($_POST) {
  $recipe_name = $_POST['recipe_name'];
  $prep_steps = $_POST['prep_steps'];
  $prep_time = $_POST['prep_time'];
  $recipe_type = $_POST['recipe_type'];
  $fk_ingredient = $_POST['fk_ingredient'];
  $calories = $_POST['calories'];
  // $fk_quantity = 1;
  $fk_userid = $_POST['fk_userid'];
  $uploadError = '';
  $picture = file_upload_recipe($_FILES['recipe_picture']);
  $sql = "INSERT INTO recipes (recipe_name,prep_steps,prep_time, recipe_type, fk_userid,calories,recipe_picture) 
VALUES ('$recipe_name', '$prep_steps', $prep_time, '$recipe_type', $fk_userid ,$calories,'$picture->fileName');";

  if ($connect->query($sql) === true) {

    $sqlloop = "INSERT INTO recipeingredient( fk_recipe,fk_ingredient) 
      VALUES (LAST_INSERT_ID(),?);";
    $stmt = $connect->prepare($sqlloop);
    foreach ($fk_ingredient as $key => $val) {
      $stmt->bind_param('s', $fk_ingredient[$key]);
      $stmt->execute();
      if ($connect->error != '') {
        $message2 = "Error while creating record. Try again: <br>" . $connect->error;
      }
    }

    $class = "success";
    $message = "The entry below was successfully created <br>
                        <table class='table w-50'><tr>
                        <td> $recipe_name </td>
                        </tr></table><hr>
                        ";
    $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    // header("refresh:3;url=recipies.php");

  } else {
    $class = "danger";
    $message = "Error while creating record. Try again: <br>" . $connect->error;
    $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
  }
  $connect->close();
}
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
  <?php require_once '../css/CSS_bootst_fonts.php' ?>
  <title>Add Recipe</title>
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
</head>
</head>

<body>
  <!-- Navbar Start-->
  <?php require_once '../sections/navbar.php'; ?>
  <!-- Navbar End-->

  <fieldset>
    <?= $message ?>
    <?= $message2 ?>
    <div class="container mb-5">
      <h2 class='h2'>Add Recipe</h2>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <table class='table tableColor table-hover'>
          <tr>

            <th>Recipe Title</th>
            <td><input class='form-control' type="text" name="recipe_name" placeholder="Recipe Name" /></ td>
          </tr>
          <tr>
            <th>Recipe Type</th>
            <td>
              <select name="recipe_type" class='form-control' aria-label="Default select example">
                <option> Flexitarian </option>
                <option> Vegetarian </option>
                <option> Vegan </option>
                <option selected value='none'> Please select </option>
              </select>
            </td>
          </tr>
          <tr>
            <th>Preparation steps</th>
            <td><textarea placeholder="Please descripe the steps" class='form-control' name="prep_steps" id="" cols="30" rows="5"></textarea></td>
          </tr>
          <tr>
            <th> Preparation Time in min </th>
            <td><input class='form-control' type="number" step="any" name="prep_time" placeholder="Time" /></td>
          </tr>
          <tr>
            <th> Calories per serving </th>
            <td><input class='form-control' type="number" step="any" name="calories" placeholder="Calories" /></td>
          </tr>
          <tr>
            <th> Ingredients </th>
            <td>
          </tr>
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
          <td><button class='btn colorBtn' type="submit"> Add Recipe </button></td>
          <td><a href="recipies.php"><button class='btn colorBtn text-dark mb-5' type="button"> Home </button></a></td>
          </tr>
          <input type=hidden name='fk_userid' value=<?php echo $userid ?>>
        </table>
      </form>
    </div>
  </fieldset>

  <!-- adding JS Bootstrap to file -->
  <?php require_once '../js/JS_bootst.php'; ?>
  <footer>
    <?php require_once '../sections/footer.php'; ?>
  </footer>

</body>

</html>