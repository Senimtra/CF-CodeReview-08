<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM locations WHERE id = {$id}";
    $result = $connect->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $loc_name = $data['loc_name'];
        $price = $data['price'];
        $descr_short = $data['descr_short'];
        $descr_long = $data['descr_long'];
        $wiki_link = $data['wiki_link'];
        $longitude = $data['longitude'];
        $latitude = $data['latitude'];
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
<html>

<head>
    <title>Edit Location</title>

    <!-- ### Add Bootstrap 5.0 & own CSS stylesheet ### -->

    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>
    <?php include_once 'header.php' ?>
    <?php include_once "navbar.php" ?>
    <div class="container">
        <div class="card mt-5 pb-5">
            <fieldset>
                <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='<?php echo $loc_image ?>' alt="<?php echo $loc_name ?>"></legend>
                <form action="actions/a_update.php" method="post">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td><input class="form-control" type="text" name="loc_name" placeholder="Location Name" value="<?php echo $loc_name ?>" /></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><input class="form-control" type="number" name="price" step="any" placeholder="Price" value="<?php echo $price ?>" /></td>
                        </tr>
                        <tr>
                            <th>Description | short</th>
                            <td><input class="form-control" type="text" name="descr_short" placeholder="Short description" value="<?php echo $descr_short ?>" /></td>
                        </tr>
                        <tr>
                            <th>Description | long</th>
                            <td><input class="form-control" type="text" name="descr_long" placeholder="Long description" value="<?php echo $descr_long ?>" /></td>
                        </tr>
                        <tr>
                            <th>Wikipedia | Url</th>
                            <td><input class="form-control" type="text" name="wiki_link" placeholder="Wikipedia link" value="<?php echo $wiki_link ?>" /></td>
                        </tr>
                        <tr>
                            <th>Longitude</th>
                            <td><input class="form-control" type="number" name="longitude" step="any" placeholder="Longitude" value="<?php echo $longitude ?>" /></td>
                        </tr>
                        <tr>
                            <th>Latitude</th>
                            <td><input class="form-control" type="number" name="latitude" step="any" placeholder="Latitude" value="<?php echo $latitude ?>" /></td>
                        </tr>
                        <tr>
                            <th>Image | Url</th>
                            <td><input class="form-control" type="text" name="loc_image" placeholder="Location Image" value="<?php echo $loc_image ?>" /></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                            <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                            <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </div>
</body>

</html>