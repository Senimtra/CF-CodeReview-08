<?php

session_start();

// ### Add components ###

require_once '../components/db_connect.php';
require_once '../components/admsession.php';

if ($_POST) {
    $id = $_POST['id'];
    $ingredient_name = $_POST['ingredient_name'];
    $calories_per_unit = $_POST['calories_per_unit'];
    $foodgroup = $_POST['foodgroup'];
    $allergens = $_POST['allergens'];
    $nutrient = $_POST['nutrient'];
    $unit = $_POST['unit'];

    // ### Update selected ingredient ###

    $sql = "UPDATE ingredients SET ingredient_name = '$ingredient_name', fk_allergenid = '$allergens', fk_nutrient = '$nutrient', fk_foodgroup = '$foodgroup', calories_per_unit = '$calories_per_unit', unit = '$unit' WHERE pk_ingredientsid = {$id}";

    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "{$ingredient_name} was successfully updated.";
    } else {
        $class = "danger";
        $message = "Error while updating ingredient: <br>" . $connect->error;
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

    <title>Update response</title>

    <!-- ### Add Bootstrap / Font-Awesome icons ### -->
    <?php require_once '../css/CSS_bootst_fonts.php' ?>

    <!-- ### Include CSS stylesheet ### -->
    <style>
        <?php include '../css/style.css' ?>
    </style>
</head>

<body>

    <!-- ### Add navbar section ###-->
    <?php require_once '../sections/navbar.php'; ?>

    <div class="container p-5">

        <!-- ### Content starts here ### -->

        <h2>Ingredient Update response</h2>
        <div class="tableColor px-3 pt-3 pb-2">
            <div class="alert alert-<?php echo $class; ?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='ingredient_update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
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