<?php
require_once 'actions/db_connect.php';

// ### Select only DVDs ###

$sql = "SELECT * FROM library_all_media WHERE media_type = 'dvd'";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "<tr>
        <td>
        <div class='card cardIndex mx-2 my-0'>
            <div class='row g-0'>
                <div class='col-md-3 p-3'>
                    <img src='$row[media_image]'></div>
                <div class='col-md-6 p-3'>
                    <div class='card-body'>
                    <h5 class='card-title'>$row[media_title]</h5>
                    <p class='card-text'>$row[author_fname]&nbsp;$row[author_lname]</p>
                    <p class='card-text'>$row[media_descr]</p>
                    <p class='card-text'><small class='text-muted'><strong>$row[media_type]</strong>&nbsp;|&nbsp;$row[pub_name]</small></p>
                    </div>
                </div>
                <div class='col-md-3 p-3 d-flex flex-column align-items-end'>
                     <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a><a href='update.php?id=" . $row['id'] . "'><button class='btn btn-warning btn-sm' type='button'>Update</button></a><a href='details.php?id=" . $row['id'] . "'><button class='btn btn-success btn-sm' type='button'>Details</button></a>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big Library DVDs</title>
    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <?php include_once "header.php" ?>
    <?php include_once "navbar.php" ?>
    <div class="container-fluid mx-auto px-5">
        <div class="wrapSideOut mx-lg-5">
            <div class="wrapSideIn mx-lg-5">
                <div class="wrapIndex mx-5">
                    <div id="groundInd">
                        <div id="borderInd">
                            <table class="table mb-0">
                                <tbody>
                                    <?= $tbody; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "footer.php" ?>
</body>

</html>