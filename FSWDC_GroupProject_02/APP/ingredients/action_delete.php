<?php
session_start();

// ### Add components ###

require_once '../components/db_connect.php';
require_once '../components/admsession.php';

if ($_POST) {
    $pk_ingredientsid = $_POST['pk_ingredientsid'];
    $ingredient_name = $_POST['ingredient_name'];

    // ### Delete selected ingredient ###

    $sql = "DELETE FROM ingredients WHERE pk_ingredientsid = {$pk_ingredientsid}";
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "{$ingredient_name} was successfully deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
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
    <title>Delete Ingredient</title>

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

        <h2 class="h2">Delete request response</h2>
        <div class="tableColor px-3 pt-3 pb-2">
            <div class="alert alert-<?= $class; ?>" role="alert">
                <p><?= $message; ?></p>
                <a href='ingredients.php'><button class="btn btn-success" type='button'>Ingredients</button></a>
                <a href='../index.php'><button class="btn btn-warning" type='button'>Home</button></a>
            </div>
        </div>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
        <!-- ### Add Bootstrap 5.0 JavaScript-bundle ### -->
        <?php require_once '../js/JS_bootst.php' ?>
</body>

</html>