<?php

// ### Sessions ###

session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit;
}

require_once '../components/db_connect.php';

// ### Fetch pet values from array ###

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pets WHERE id = {$id}";
    $result = $connect->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $name = $data['name'];
        $breed = $data['breed'];
        $size = $data['size'];
        $age = $data['age'];
        $description = $data['description'];
        $hobbies = $data['hobbies'];
        $loc_zip = $data['loc_zip'];
        $loc_city = $data['loc_city'];
        $loc_address = $data['loc_address'];
        $image = $data['image'];
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

    <!-- ### Add Bootstrap & own CSS file ### -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet</title>
    <?php require_once '../components/boot.php' ?>
    <link rel="stylesheet" type="text/css" href="../../styles/styles.css">
</head>

<body>

    <!-- ### Include header & navbar ### -->

    <?php include_once '../header.php' ?>
    <?php include_once 'navbar_adm_a.php' ?>
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
                                        <fieldset>
                                            <legend class='h2'>Update request <img class="formImg" src='<?php echo $image ?>' alt="<?php echo $name ?>">#<?php echo $id ?></legend>
                                            <form action="actions/a_update.php" method="post">
                                                <table class="table">
                                                    <tr>
                                                        <th>Name</th>
                                                        <td><input class="form-control" type="text" name="name" placeholder="Pet Name" value="<?php echo $name ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Breed</th>
                                                        <td><input class="form-control" type="text" name="breed" placeholder="Breed Name" value="<?php echo $breed ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Size</th>
                                                        <td><input class="form-control" type="text" name="size" placeholder="Pet Size" value="<?php echo $size ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Age</th>
                                                        <td><input class="form-control" type="number" name="age" step="any" placeholder="Age" value="<?php echo $age ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Description</th>
                                                        <td><input class="form-control" type="text" name="description" placeholder="Description" value="<?php echo $description ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Hobbies</th>
                                                        <td><input class="form-control" type="text" name="hobbies" placeholder="Hobbies" value="<?php echo $hobbies ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <th>ZIP-code</th>
                                                        <td><input class="form-control" type="number" name="loc_zip" step="any" placeholder="ZIP-code" value="<?php echo $loc_zip ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td><input class="form-control" type="text" name="loc_city" placeholder="City" value="<?php echo $loc_city ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <td><input class="form-control" type="text" name="loc_address" placeholder="Address" value="<?php echo $loc_address ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Picture</th>
                                                        <td><input class="form-control" type="text" name="image" placeholder="Image-Url" value="<?php echo $image ?>" /></td>
                                                    </tr>
                                                    <tr>
                                                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                                                        <input type="hidden" name="picture" value="<?php echo $data['image'] ?>" />
                                                        <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                                                        <td><a href="../dashBoard.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </fieldset>
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

    <?php include_once '../footer.php' ?>
</body>

</html>