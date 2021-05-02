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

// ### Fetch id & image ###

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pets WHERE id = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    if ($result->num_rows == 1) {
        $name = $data['name'];
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
<html lang="en">

<head>

    <!-- ### Add Bootstrap & own CSS file ### -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
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
                                            <legend class='h2 mb-3'>Delete request <img class="formImg" src='<?php echo $image ?>' alt="<?php echo $name ?>"></legend>
                                            <h5>You have selected the data below:</h5>
                                            <table class="table w-75 mt-3">
                                                <tr>
                                                    <td><?php echo $name ?></td>
                                                </tr>
                                            </table>

                                            <h3 class="mb-4">Do you really want to delete this product?</h3>
                                            <form action="actions/a_delete.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $id ?>" />
                                                <input type="hidden" name="picture" value="<?php echo $image ?>" />
                                                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                                                <a href="../dashBoard.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
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