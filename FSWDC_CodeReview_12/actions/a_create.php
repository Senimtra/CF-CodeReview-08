<?php
require_once 'db_connect.php';

if ($_POST) {
    $loc_name = $_POST['loc_name'];
    $price = $_POST['price'];
    $descr_short = $_POST['descr_short'];
    $descr_long = $_POST['descr_long'];
    $wiki_link = $_POST['wiki_link'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $loc_image = $_POST['loc_image'];

    $sql = "INSERT INTO locations (loc_name, price, descr_short, descr_long, wiki_link, longitude, latitude, loc_image) VALUES ('$loc_name', '$price', '$descr_short', '$descr_long', '$wiki_link', '$longitude', '$latitude', '$loc_image')";

    if ($connect->query($sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td>$loc_name</td>
            <td>$price</td>
            </tr></table><hr>";
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
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
    <title>Update</title>

    <!-- ### Add Bootstrap 5.0 & own CSS stylesheet ### -->

    <?php require_once '../components/bootstrap.php' ?>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <?php include_once "../header.php" ?>
    <?php include_once '../navbar_a.php' ?>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>