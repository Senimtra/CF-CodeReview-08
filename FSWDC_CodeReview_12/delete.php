<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM locations WHERE id = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    if ($result->num_rows == 1) {
        $loc_name = $data['loc_name'];
        $price = $data['price'];
        $loc_image = $data['loc_image'];
    } else {
        header("location: error.php");
    }
    $connect->close();
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Location</title>

    <!-- ### Add Bootstrap 5.0 & own CSS stylesheet ### -->

    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 70%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>

    <!-- ### Including Header & Navbar ### -->

    <?php include_once 'header.php' ?>
    <?php include_once "navbar.php" ?>
    <div class="container">
        <div class="card mt-5 pb-5">
            <fieldset>
                <legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='<?php echo $loc_image ?>' alt="<?php echo $loc_name ?>"></legend>
                <h5>You have selected the data below:</h5>
                <table class="table w-75 mt-3">
                    <tr>
                        <td><?php echo $loc_name ?></td>
                    </tr>
                </table>

                <h3 class="mb-4">Do you really want to delete this location?</h3>
                <form action="actions/a_delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <input type="hidden" name="loc_image" value="<?php echo $loc_image ?>" />
                    <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                    <a href="index.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
                </form>
            </fieldset>
        </div>
    </div>
</body>

</html>