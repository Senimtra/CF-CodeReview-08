<?php
require_once 'db_connect.php';

if ($_POST) {
    $id = $_POST['id'];

    // ### Delete record ###

    $sql = "DELETE FROM library_all_media WHERE id = {$id}";
    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    $connect->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Message</title>
    <?php require_once '../components/bootstrap.php' ?>
    <link rel="stylesheet" type="text/css" href="../../styles/styles.css">
</head>

<body>
    <?php include_once "../header.php" ?>
    <?php include_once "../navbar_a.php" ?>
    <div class="container-fluid mx-auto px-5">
        <div class="wrapSideOut mx-lg-5">
            <div class="wrapSideIn mx-lg-5">
                <div class="wrapIndex mx-5">
                    <div id="groundInd">
                        <div id="borderInd">
                            <table class="table table-striped mb-0">
                                <tr>
                                    <td>
                                        <div class="mt-3 mb-3">
                                            <h1>Delete request response</h1>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="alert alert-<?= $class; ?>" role="alert">
                                            <p><?= $message; ?></p>
                                            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "../footer_a.php" ?>
</body>

</html>