<?php

session_start();

// ### Add components ###

require_once '../components/db_connect.php';
require_once '../components/file_upload.php';
require_once '../components/sessions.php';

// ### Select record from ingredients joining info ###

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sqlIngr = "SELECT *from ingredients i INNER JOIN allergen a ON i.fk_allergenid = a.pk_allergenid INNER JOIN nutrient n ON n.pk_nutrient = i.fk_nutrient WHERE i.pk_ingredientsid = {$id}";
  $resultIngr = $connect->query($sqlIngr);

  // ### Check present data ###

  if ($resultIngr->num_rows == 1) {
    $data = $resultIngr->fetch_assoc();
    $ingredient_name = $data['ingredient_name'];
    $calories_per_unit = $data['calories_per_unit'];
    $unit = $data['unit'];
    $allergen = $data['allergen'];
    $nutrient = $data['nutrient_name'];
    $contained = $data['contained'];
    $functions = $data['functions'];
    $wiki = $data['wiki'];
  }
} else {
  header("Location:../error.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo $ingredient_name ?> details</title>

  <!-- ### Add Bootstrap / Font-Awesome icons ### -->
  <?php require_once "../css/CSS_bootst_fonts.php" ?>

  <!-- ### Include CSS stylesheet ### -->
  <style>
    <?php include "../css/style.css" ?>
  </style>

</head>

<body>

  <!-- ### Add navbar section ###-->
  <?php require_once '../sections/navbar.php'; ?>

  <div class="container p-5">

    <!-- ### Content starts here ### -->

    <h2 class='h2'><?= $ingredient_name ?> <small> &nbsp;-&nbsp;&nbsp;in detail</small></h2>
    <table class='table tableColor table-hover'>
      <tr>
        <th class="text-nowrap">Energy</th>
        <td>
          <?= $calories_per_unit ?> kcal / <?php echo $unit ?></td>
      </tr>
      <tr>
        <th>Allergen</th>
        <td><?= $allergen ?></td>
      </tr>
      <tr>
        <th>Nutrient</th>
        <td>
          <?php echo $nutrient; ?>
        </td>
      </tr>
      <tr>
        <th class="text-nowrap">Contained in</th>
        <td>
          <?php echo $contained; ?>
        </td>
      </tr>
      <tr>
        <th>Functions</th>
        <td>
          <?php echo $functions; ?>
        </td>
      </tr>
      <tr>
        <th class="text-nowrap">Further read</th>
        <td><a href="<?= $wiki ?>" target='_blank'><i>https://www.wikipedia.org</i></a>
        </td>
      <tr>
        <td colspan="2"><a href='ingredients.php'><button class='btn colorBtn text-warning px-3'>Go back</button></a></td>
      </tr>
    </table>
  </div>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
  <!-- ### Add Bootstrap 5.0 JavaScript-bundle ### -->
  <?php require_once '../js/JS_bootst.php' ?>
</body>

</html>