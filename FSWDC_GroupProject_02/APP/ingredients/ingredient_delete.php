<?php

session_start();

// ### Add components ###

require_once '../components/db_connect.php';
require_once '../components/admsession.php';

// ### Select chosen record from ingredients ###

if ($_GET['id']) {
    $pk_ingredientsid = $_GET['id'];
    $sql = "SELECT * FROM ingredients WHERE pk_ingredientsid = {$pk_ingredientsid}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();

    // ### Check present data ###

    if ($result->num_rows == 1) {
        $ingredient_name = $data['ingredient_name'];
    } else {
        header("location: ../error.php");
    }
    $connect->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Ingredient</title>

    <!-- ### Add Bootstrap / Font-Awesome icons ### -->
    <?php require_once '../css/CSS_bootst_fonts.php' ?>

    <!-- ### Include CSS stylesheet ### -->
    <style>
        <?php include '../css/style.css';
        ?>
    </style>
</head>

<body>

    <!-- ### Add navbar section ###-->
    <?php require_once '../sections/navbar.php'; ?>

    <fieldset>
        <div class="container p-5">

            <!-- ### Content starts here ### -->

            <h2 class='h2'>Delete request</h2>
            <table class="table tableColor  table-hover">
                <thead class='table  table-light'>
                    <th>
                        <h4>You have selected this data:</h4>
                    </th>
                    <th></th>
                    <th> <?php echo $ingredient_name ?></th>
                </thead>
                <thead class='table'>
                    <th>
                        <h3 class="mb-4">Do you really want to delete this ingredient?</h3>
                    </th>
                </thead>

                <!-- ### Build delete-button ### -->

                <form action="action_delete.php" method="post">
                    <th><input type="hidden" name="pk_ingredientsid" value="<?php echo $pk_ingredientsid ?>" /></th>
                    <th><input type="hidden" name="ingredient_name" value="<?php echo $data['ingredient_name'] ?>" />
                    </th>
                    <th><button class="btn colorBtn text-danger" type="submit">Yes, delete it!</button></th>
                    <th><a href="ingredients.php"><button class="btn colorBtn text-warning" type="button">No, go back
                                !</button></a></th>
                </form>
            </table>
        </div>
    </fieldset>
<!-- Footer Start -->
<?php require_once '../sections/footer.php'; ?>
  <!-- Footer End -->
    <!-- ### Add Bootstrap 5.0 JavaScript-bundle ### -->
    <?php require_once "../js/JS_bootst.php"; ?>
</body>

</html>