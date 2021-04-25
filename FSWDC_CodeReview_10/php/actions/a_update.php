<?php
require_once 'db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
    $media_title = $_POST['m_name'];
    $media_type = $_POST['m_type'];
    $media_date = $_POST['m_date'];
    $media_isbn = $_POST['m_isbn'];
    $media_descr = $_POST['m_descr'];
    $media_image = $_POST['m_image'];
    $media_status = $_POST['m_status'];
    $author_fname = $_POST['a_fname'];
    $author_lname = $_POST['a_lname'];
    $pub_name = $_POST['p_name'];
    $pub_address = $_POST['p_address'];
    $pub_size = $_POST['p_size'];

    // ### Update record ###

    $sql = "UPDATE library_all_media SET media_title = '$media_title', media_type = '$media_type', media_date = '$media_date', media_isbn = '$media_isbn', media_descr = '$media_descr', media_image = '$media_image', media_status = '$media_status', author_fname = '$author_fname', author_lname = '$author_lname', pub_name = '$pub_name', pub_address = '$pub_address', pub_size = '$pub_size' WHERE id = {$id}";

    if ($connect->query($sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . $connect->error;
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
    <title>Update Message</title>
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
                                            <h1>Update request response</h1>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="alert alert-<?php echo $class; ?>" role="alert">
                                            <p><?php echo ($message) ?? ''; ?></p>
                                            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
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