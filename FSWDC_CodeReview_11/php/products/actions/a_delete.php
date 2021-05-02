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

if ($_POST) {
    $id = $_POST['id'];

    // ### Delete pet from table ###

    $sql = "DELETE FROM pets WHERE id = {$id}";
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
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
    <title>Delete</title>
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
                                            <h1>Delete request response</h1>
                                        </div>
                                        <div class="alert alert-<?= $class; ?>" role="alert">
                                            <p><?= $message; ?></p>
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