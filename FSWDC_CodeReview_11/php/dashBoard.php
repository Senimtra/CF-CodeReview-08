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

// ### List all pet records from table ###

$sql = "SELECT * FROM pets";
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
                        <p class='card-title'><strong>$row[name]</strong><small>&nbsp;&nbsp;|&nbsp;$row[breed],&nbsp;$row[size],&nbsp;$row[age]&nbsp;years</small></h5>
                        <p class='card-text'><small>$row[loc_address],&nbsp;$row[loc_zip]&nbsp;$row[loc_city]</small></p>
                        <p class='card-text'><i>$row[description]<br>$row[hobbies]</i></p>
                    </div>
                </div>
                <div class='col-md-1 p-3'>
                </div>
                <div class='col-md-1 p-3 d-flex flex-column align-items-end'>
                <a href='products/update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
                <a href='products/delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
                </div>
            </div>
        </div>
        </td>
        </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ### Add Bootstrap & own CSS file ### -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
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
                                    <div>

                                        <!-- ### Main content begins here ## -->

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