<?php

session_start();

// ### Add components ###

require_once '../components/db_connect.php';
require_once '../components/sessions.php';

if ($_POST) {
    $ingredient_name = $_POST['ingredient_name'];
    $allergens = $_POST['allergens'];
    $nutrient = $_POST['nutrient'];
    $foodgroup = $_POST['foodgroup'];
    $calories_per_unit = $_POST['calories_per_unit'];
    $unit = $_POST['unit'];

    // ### Create ingredient record ###

    $sql = "INSERT INTO ingredients (ingredient_name, fk_allergenid, fk_nutrient, fk_foodgroup, calories_per_unit, unit) VALUES ('$ingredient_name', '$allergens', '$nutrient', '$foodgroup', '$calories_per_unit', '$unit')";

    if ($connect->query($sql) === true) {
        $class = "success";
        $message = "The ingredient below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $ingredient_name </td>
            </tr></table><hr>";
    } else {
        $class = "danger";
        $message = "Error while creating ingredient. Try again: <br>" . $connect->error;
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
    <title>Create Ingredient</title>
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

    <div class="container p-5">

        <!-- ### Content starts here ### -->

        <h2 class="h2">Create Ingredient response</h2>
        <div class="tableColor px-3 pt-3 pb-2">
            <div class="alert alert-<?= $class; ?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <a href='ingredients.php'><button class="btn btn-success" type='button'>Ingredients</button></a>
                <a href='../index.php'><button class="btn btn-secondary" type='button'>Home</button></a>
            </div>
        </div>
    </div>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
    <!-- ### Add Bootstrap 5.0 JavaScript-bundle ### -->
    <?php require_once '../js/JS_bootst.php' ?>
</body>

</html>