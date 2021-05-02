<?php

// ### Sessions ###

session_start();

require_once 'components/db_connect.php';
require_once 'components/file_upload.php';

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
$backBtn = '';

if (isset($_SESSION["user"])) {
    $backBtn = "home.php";
}

if (isset($_SESSION["adm"])) {
    $backBtn = "dashBoard.php";
}
if (isset($_SESSION["user"])) {
    $session = $_SESSION["user"];
} else {
    $session = $_SESSION["adm"];
}

// ### Fetch all user values from array ###

$sql = "SELECT * FROM user WHERE id = {$session}";
$result = mysqli_query($connect, $sql);
$row = $result->fetch_assoc();

if ($row["status"] == "adm") {
    if (isset($_GET['id'])) {
        $id = $_GET['id']; # $_SESSION["user"];
        $sql = "SELECT * FROM user WHERE id = {$id}";
        $result = $connect->query($sql);
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            $f_name = $data['first_name'];
            $l_name = $data['last_name'];
            $email = $data['email'];
            $date_birth = $data['date_of_birth'];
            $picture = $data['picture'];
        }
    }
} else {
    $id = $_SESSION["user"];
    $sql = "SELECT * FROM user WHERE id = {$id}";
    $result = $connect->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $f_name = $data['first_name'];
        $l_name = $data['last_name'];
        $email = $data['email'];
        $date_birth = $data['date_of_birth'];
        $picture = $data['picture'];
    }
}

// ### Update user ###

$class = 'd-none';
if (isset($_POST["submit"])) {
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $id = $_POST['id']; # $_SESSION["user"];
    //variable for upload pictures errors is initialized
    $uploadError = '';
    $pictureArray = file_upload($_FILES['picture']); //file_upload() called
    $picture = $pictureArray->fileName;
    if ($pictureArray->error === 0) {
        ($_POST["picture"] == "avatar.png") ?: unlink("pictures/{$_POST["picture"]}");
        $sql = "UPDATE user SET first_name = '$f_name', last_name = '$l_name', email = '$email', date_of_birth = '$date_of_birth', picture = '$pictureArray->fileName' WHERE id = {$id}";
    } else {
        $sql = "UPDATE user SET first_name = '$f_name', last_name = '$l_name', email = '$email', date_of_birth = '$date_of_birth' WHERE id = {$id}";
    }
    if ($connect->query($sql) === true) {
        $class = "alert alert-success";
        $message = "The record was successfully updated";
        $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
        header("refresh:3;url=home.php?id={$id}");
    } else {
        $class = "alert alert-danger";
        $message = "Error while updating record : <br>" . $connect->error;
        $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
        header("refresh:3;url=update.php?id={$id}");
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
    <title>Edit User</title>
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
                                            <p><?php echo ($uploadError) ?? ''; ?></p>
                                        </div>
                                        <h2>Update</h2>
                                        <img class="formImg" src='pictures/<?php echo $data['picture'] ?>' alt="<?php echo $f_name ?>">
                                        <form method="post" enctype="multipart/form-data">
                                            <table class="table">
                                                <tr>
                                                    <th>First Name</th>
                                                    <td><input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?php echo $f_name ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <th>Last Name</th>
                                                    <td><input class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?= $l_name ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <th>Date of birth</th>
                                                    <td><input class="form-control" type="date" name="date_of_birth" placeholder="Date of birth" value="<?php echo $date_birth ?>" /></td>
                                                </tr>
                                                <tr>
                                                    <th>Picture</th>
                                                    <td><input class="form-control" type="file" name="picture" /></td>
                                                </tr>
                                                <tr>
                                                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                                                    <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                                                    <td><button name="submit" class="btn btn-success" type="submit">Save Changes</button></td>
                                                    <td><a href="<?php echo $backBtn ?>"><button class="btn btn-warning" type="button">Back</button></a></td>
                                                </tr>
                                            </table>
                                        </form>
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