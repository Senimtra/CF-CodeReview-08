<?php

session_start();

// ### Add components ###

require_once '../components/db_connect.php';
require_once '../components/admsession.php';

// ### Select chosen record from ingredients ###

if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM ingredients WHERE pk_ingredientsid = {$id}";
  $result = $connect->query($sql);

  // ### Check present data ###

  if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
    $id = $data['pk_ingredientsid'];
    $ingredient_name = $data['ingredient_name'];
    $fk_nutrient = $data['fk_nutrient'];
    $calories_per_unit = $data['calories_per_unit'];
    $unit = $data['unit'];

    $foodgroup = $data['fk_foodgroup'];
    $allergens = $data['fk_allergenid'];
    $nutrient = $data['fk_nutrient'];

    // ### Build up foodgroup dropdown-button ###

    $resultFgrp = mysqli_query($connect, "SELECT * FROM foodgroups");
    $fgrpList = "";
    if (mysqli_num_rows($resultFgrp) > 0) {
      while ($row = $resultFgrp->fetch_array(MYSQLI_ASSOC)) {
        if ($row['pk_foodgroup'] == $foodgroup) {
          $fgrpList .= "<option selected value='{$row['pk_foodgroup']}'>{$row['foodgroup']}</option>";
        } else {
          $fgrpList .= "<option value='{$row['pk_foodgroup']}'>{$row['foodgroup']}</option>";
        }
      }
    } else {
      $allrList = "<li>There are no allergens registered.</li>";
    }

    // ### Build up allergen dropdown-button ###

    $resultAllr = mysqli_query($connect, "SELECT * FROM allergen");
    $allrList = "";
    if (mysqli_num_rows($resultAllr) > 0) {
      while ($row = $resultAllr->fetch_array(MYSQLI_ASSOC)) {
        if ($row['pk_allergenid'] == $allergens) {
          $allrList .= "<option selected value='{$row['pk_allergenid']}'>{$row['allergen']}</option>";
        } else {
          $allrList .= "<option value='{$row['pk_allergenid']}'>{$row['allergen']}</option>";
        }
      }
    } else {
      $allrList = "<li>There are no allergens registered.</li>";
    }

    // ### Build up nutrient dropdown-button ###

    $resultNutr = mysqli_query($connect, "SELECT * FROM nutrient");
    $nutrList = "";
    if (mysqli_num_rows($resultNutr) > 0) {
      while ($row = $resultNutr->fetch_array(MYSQLI_ASSOC)) {
        if ($row['pk_nutrient'] == $nutrient) {
          $nutrList .= "<option selected value='{$row['pk_nutrient']}'>{$row['nutrient_name']} - {$row['contained']}</option>";
        } else {
          $nutrList .= "<option value='{$row['pk_nutrient']}'>{$row['nutrient_name']} - {$row['contained']}</option>";
        }
      }
    } else {
      $nutrList = "<li>There are no nutrients registered.</li>";
    }
  } else {
    header("location: ../error.php");
  }

  // ### Closing connection ###

  $connect->close();
} else {
  header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit <?php echo $ingredient_name ?></title>

  <!-- ### Add Bootstrap / Font-Awesome icons ### -->
  <?php require_once "../css/CSS_bootst_fonts.php" ?>

  <!-- ### Include CSS stylesheet ### -->
  <style>
    <?php include '../css/style.css'; ?>
  </style>
</head>

<body>

  <!-- ### Add navbar section ###-->
  <?php require_once '../sections/navbar.php'; ?>

  <fieldset>
    <div class="container p-5">

      <!-- ### Build update-form ### -->

      <h2 class='h2'>Edit Ingredient</h2>
      <form action="action_update.php" method="post">
        <table class="table tableColor  table-hover">
          <tr>
            <th>Ingredient</th>
            <td><input class="form-control" type="text" name="ingredient_name" placeholder="Ingredient Name" value="<?php echo $ingredient_name ?>" /></td>
          </tr>
          <th>Foodgroup</th>
          <td>
            <select class="form-select" name="foodgroup" aria-label="Default select example">

              <!-- ### Output foodgroup options list ### -->

              <?php echo  $fgrpList; ?>
            </select>
          </td>
          </tr>
          </tr>
          <th>Allergens</th>
          <td>
            <select class="form-select" name="allergens" aria-label="Default select example">

              <!-- ### Output allergen options list ### -->

              <?php echo  $allrList; ?>
            </select>
          </td>
          </tr>
          </tr>
          <th>Nutrient</th>
          <td>
            <select class="form-select" name="nutrient" aria-label="Default select example">

              <!-- ### Output nutrient options list ### -->

              <?php echo  $nutrList; ?>
            </select>
          </td>
          </tr>
          <tr>
            <th>Calories/Unit</th>
            <td><input class="form-control" type="number" name="calories_per_unit" step="any" placeholder="Calories/Unit" value="<?php echo $calories_per_unit ?>" /></td>
          </tr>
          <tr>
            <th>Unit</th>
            <td><input class="form-control" type="text" name="unit" placeholder="Unit" value="<?php echo $unit ?>" /></td>
          </tr>
          <input type="hidden" name="id" value="<?php echo $data['pk_ingredientsid'] ?>" />
          <td><button class="btn colorBtn text-nowrap" type="submit">Save Changes</button></td>
          <td><a href="ingredients.php"><button class="btn colorBtn text-warning" type="button">Back</button></a></td>
          </tr>
        </table>
      </form>
    </div>
  </fieldset>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
  <!-- ### Add Bootstrap 5.0 JavaScript-bundle ### -->
  <?php require_once '../js/JS_bootst.php' ?>
</body>

</html>