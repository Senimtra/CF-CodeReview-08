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

// ### Cancel pet adoption ###

if (isset($_POST['cancel'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM adoptions WHERE id = $id";
    mysqli_query($connect, $sql);
}

// ### List all adoption records ###

$sql = "SELECT * FROM adoptions";
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
                        <p class='card-title'><b>Name:</b> &nbsp;$row[name]</strong>
                        <p class='card-text'><b>Breed:</b> &nbsp;$row[breed]</p>
                        <p class='card-text'><b>Adopter:</b> &nbsp;User #$row[fk_userId]</p>
                        <p class='card-text'><b>Adoption Date:</b>&nbsp; $row[adopt_date]</p>
                    </div>
                </div>
                <div class='col-md-1 p-3'>
                </div>
                <div class='col-md-1 p-3 d-flex flex-column align-items-end'>
                    <form action='adoptions.php' method='post'>
                    <input type ='hidden' name='id' class='form-control' value='" . $row['id'] . "'/>
                    <button class='btn btn-danger btn-sm' name='cancel' type='submit'>Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        </td>
        </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center><div class='msg'>Sorry, there aren't any adoptions yet.</div></center></td></tr>";
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ### Add Bootstrap & own CSS file ### -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row['first_name']; ?></title>
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