<?php

// ### Sessions ###

session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ../../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../../index.php");
    exit;
}

require_once '../../components/db_connect.php';

// ### Get values from update form ###

if ($_POST) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $description = $_POST['description'];
    $hobbies = $_POST['hobbies'];
    $loc_zip = $_POST['loc_zip'];
    $loc_city = $_POST['loc_city'];
    $loc_address = $_POST['loc_address'];
    $image = $_POST['image'];

    // ### Update pet record ###

    $sql = "UPDATE pets SET name = '$name', breed = '$breed', size = '$size', age = '$age', description = '$description', hobbies = '$hobbies', loc_zip = '$loc_zip', loc_city = '$loc_city', loc_address = '$loc_address', image = '$image' WHERE id = {$id}";

    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . $connect->error;
    }
    $connect->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ### Add Bootstrap & own CSS file ### -->

    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../../components/boot.php' ?>
    <link rel="stylesheet" type="text/css" href="../../../styles/styles.css">
</head>

<body>

    <!-- ### Include header & navbar ### -->

    <?php include_once '../../header.php' ?>
    <?php include_once 'navbar_adm_b.php' ?>
    <div class="container-fluid mx-auto pt-0 px-5">
        <div class="wrapSideOut mx-lg-5">
            <div class="wrapSideIn mx-lg-5">
                <div class="wrapHero m-4 mt-0 mb-0">
                    <div class="outerRimNav">
                        <div class="innerRimNav">
                            <div id="groundNav">
                                <div id="borderMain">

                                    <!-- ### Main content begins here ### -->

                                    <div class="container content">
                                        <div class="mt-3 mb-3">
                                            <h1>Update request response</h1>
                                        </div>
                                        <div class="alert alert-<?php echo $class; ?>" role="alert">
                                            <p><?php echo ($message) ?? ''; ?></p>
                                            <p><?php echo ($uploadError) ?? ''; ?></p>
                                            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
                                            <a href='../../dashBoard.php'><button class="btn btn-success" type='button'>Home</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ### Include footer ### -->

    <?php include_once '../../footer.php' ?>
</body>

</html>