<?php

session_start();

// ### Add components ###

require_once '../components/db_connect.php';
require_once '../components/sessions.php';

// ### Get dropdown-options from foodgroups ###

$foodgroup = "";
$result = mysqli_query($connect, "SELECT * FROM foodgroups");
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $foodgroup .=
    "<option value='{$row['pk_foodgroup']}'>{$row['foodgroup']}</option>";
}

// ### Get dropdown-options from allergens ###

$allergens = "";
$result = mysqli_query($connect, "SELECT * FROM allergen");
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $allergens .=
    "<option value='{$row['pk_allergenid']}'>{$row['allergen']}</option>";
}

// ### Get dropdown-options from nutrients ###

$nutrient = "";
$result = mysqli_query($connect, "SELECT * FROM nutrient");
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $nutrient .=
    "<option value='{$row['pk_nutrient']}'>{$row['nutrient_name']} - {$row['contained']}</option>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Ingredient</title>

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

      <!-- ### Build create-form ### -->

      <h2 class='h2'>Add Ingredient</h2>
      <form action="action_create.php" method="post">
        <table class='table tableColor  table-hover'>
          <tr>
            <th>Ingredient</th>
            <td><input class='form-control' type="text" name="ingredient_name" placeholder="Ingredient" /></td>
          </tr>
          <tr>
            <th>Foodgroup</th>
            <td>
              <select class="form-select" name="foodgroup" aria-label="Default select example">

                <!-- ### Output foodgroup options list ### -->

                <?php echo $foodgroup; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>Allergens</th>
            <td>
              <select class="form-select" name="allergens" aria-label="Default select example">

                <!-- ### Output allergen options list ### -->

                <?php echo $allergens; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>Nutrient</th>
            <td>
              <select class="form-select" name="nutrient" aria-label="Default select example">

                <!-- ### Output nutrient options list ### -->

                <?php echo $nutrient; ?>
              </select>
            </td>
          </tr>
          <tr>
            <th>Calories/Unit</th>
            <td><input class="form-control" type="number" name="calories_per_unit" step="any" placeholder="Calories/Unit" /></td>
          </tr>
          <tr>
            <th>Unit</th>
            <td><input class="form-control" type="text" name="unit" placeholder="Unit" /></td>
          </tr>
          <tr>
            <td><button class='btn colorBtn text-success text-nowrap' type="submit">Insert Ingredient</button></td>
            <td><a href="../index.php"><button class='btn colorBtn ' type="button">Home</button></a></td>
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
</body>

</html>