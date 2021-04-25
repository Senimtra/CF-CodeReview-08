<?php
require_once 'actions/db_connect.php';

// ### SELECT all publishers (distinct) ###

$sql = "SELECT DISTINCT pub_name, pub_address, pub_size FROM library_all_media GROUP BY pub_name";
$result = mysqli_query($connect, $sql);
$tbody = '';
if (mysqli_num_rows($result)  > 0) {
    $i = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $tbody .= "<tr>
        <td>
        <div class='card p-1'>
        <div><strong>$row[pub_name]</strong>&nbsp;|&nbsp;<i>$row[pub_size]&nbsp;size</i></div>
        <div>$row[pub_address]</div>
        </div>
        </td>

        <td><a href='actions/a_publisher.php?pub_name=" . $row['pub_name'] . "'><button class='btn btn-primary btn-sm btn-pub' type='button'>stored&nbsp;Media</button></a></td>

            </tr>";
    };
} else {
    $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher list</title>
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
                            <table class="table table-striped mb-0">
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