<?php

// ### Sessions ###

session_start();
require_once 'components/db_connect.php';

if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$res = mysqli_query($connect, "SELECT * FROM user WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

// ### Add pet adoption record ###

if (isset($_POST['submit'])) {
    $userID = $_SESSION['user'];
    $petID = $_POST['id'];
    $image = $_POST['image'];
    $breed = $_POST['breed'];
    $name = $_POST['name'];
    $sql = "INSERT INTO adoptions (fk_petId, name, breed, fk_userId, image) VALUES ('$petID', '$name', '$breed', '$userID', '$image')";
    if ($connect->query($sql) === TRUE) {
        header("Location: home.php");
    } else {
        $class = "danger";
        $message = "The adoption was not registered due to:" . $sql . "<br>" . $connect->error;
    };
}

// ### Selecting every pet that is not yet adopted ###

$sql = "SELECT * FROM pets WHERE id NOT IN (SELECT fk_petId FROM adoptions)";
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
        <td>
        <div class='card cardIndex mx-2 my-3'>
            <div class='row g-0'>
                <div class='col-md-3 p-3 cardImg'>
                    <img src='$row[image]'>
                </div>
                <div class='col-md-7 p-3'>
                    <div class='card-body'>
                        <p class='card-title'><strong>$row[name]</strong><small>&nbsp;&nbsp;|&nbsp;$row[breed],&nbsp;$row[size],&nbsp;$row[age]&nbsp;years</small>
                        <p class='card-text'><small>$row[loc_address],&nbsp;$row[loc_zip]&nbsp;$row[loc_city]</small></p>
                        <p class='card-text'><i>$row[description]<br>$row[hobbies]</i></p>
                    </div>
                </div>
                <div class='col-md-1 p-3'>
                </div>
                <div class='col-md-1 p-3 d-flex flex-column align-items-end'>
                    <form action='home.php' method='post'>
                        <input type ='hidden' name='id' class='form-control' value='" . $row['id'] . "'/>
                        <input type ='hidden' name='image' class='form-control' value='" . $row['image'] . "'/>
                        <input type ='hidden' name='breed' class='form-control' value='" . $row['breed'] . "'/>
                        <input type ='hidden' name='name' class='form-control' value='" . $row['name'] . "'/>
                        <button class='btn btn-success btn-sm' name='submit' type='submit'>Adopt</button>
                    </form>
                </div>
            </div>
        </div>
        </td>
        </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available</center></td></tr>";
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ### Add Bootstrap & own CSS file ### -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php require_once 'components/boot.php' ?>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>

    <!-- ### Include header & navbar ### -->

    <?php include_once 'header.php' ?>
    <?php include_once 'navbar.php' ?>
    <div class="container-fluid mx-auto pt-0 px-5">
        <div class="wrapSideOut mx-lg-5">
            <div class="wrapSideIn mx-lg-5">
                <div class="wrapHero m-4 mt-0 mb-0">
                    <div class="outerRimNav">
                        <div class="innerRimNav">
                            <div id="groundNav">
                                <div id="borderMain">
                                    <div>

                                        <!-- ### Main content begins here ### -->

                                        <tbody>
                                            <?= $tbody; ?>
                                        </tbody>

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