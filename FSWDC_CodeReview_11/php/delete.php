<?php

// ### Sessions ###

session_start();
require_once 'components/db_connect.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}

$class = 'd-none';

// ### Fetch user values from array ###

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    if ($result->num_rows == 1) {
        $f_name = $data['first_name'];
        $l_name = $data['last_name'];
        $email = $data['email'];
        $date_of_birth = $data['date_of_birth'];
        $picture = $data['picture'];
    }
}

// ### Delete user ###

if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture == "avatar.png") ?: unlink("pictures/$picture");
    $sql = "DELETE FROM user WHERE id = {$id}";
    if ($connect->query($sql) === TRUE) {
        $class = "alert alert-success";
        $message = "Successfully Deleted!";
        header("refresh:3;url=dashboard.php");
    } else {
        $class = "alert alert-danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ### Add Bootstrap & own CSS file ### -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <?php require_once 'components/boot.php' ?>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>

    <!-- ### Include header & navbar ### -->

    <?php include_once 'header.php' ?>
    <?php include_once 'navbar_adm.php' ?>
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
                                        <div class="<?php echo $class; ?>" role="alert">
                                            <p><?php echo ($message) ?? ''; ?></p>
                                        </div>
                                        <fieldset>
                                            <legend class='h2 mb-3'>Delete request <img class="formImg" src='pictures/<?php echo $picture ?>' alt="<?php echo $f_name ?>"></legend>
                                            <h5>You have selected the data below:</h5>
                                            <table class="table w-75 mt-3">
                                                <tr>
                                                    <td><?php echo "$f_name $l_name" ?></td>
                                                    <td><?php echo $email ?></td>
                                                    <td><?php echo $date_of_birth ?></td>
                                                </tr>
                                            </table>
                                            <h3 class="mb-4">Do you really want to delete this user?</h3>
                                            <form method="post">
                                                <input type="hidden" name="id" value="<?php echo $id ?>" />
                                                <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                                                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                                                <a href="dashboard.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
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

    <?php include_once 'footer.php' ?>
</body>

</html>