<?php
require_once 'db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
    $loc_name = $_POST['loc_name'];
    $price = $_POST['price'];
    $descr_short = $_POST['descr_short'];
    $descr_long = $_POST['descr_long'];
    $wiki_link = $_POST['wiki_link'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $loc_image = $_POST['loc_image'];

    $sql = "UPDATE locations SET loc_name = '$loc_name', price = '$price', descr_short = '$descr_short', descr_long = '$descr_long', wiki_link = '$wiki_link', longitude = '$longitude', latitude = '$latitude', loc_image = '$loc_image' WHERE id = {$id}";

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
    <meta charset="UTF-8">
    <title>Update</title>

    <!-- ### Add Bootstrap 5.0 & own CSS stylesheet ### -->

    <?php require_once '../components/bootstrap.php' ?>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <?php include_once '../header.php' ?>
    <?php include_once '../navbar_a.php' ?>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>