<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];

    // ### Select record to delete ###

    $sql = "SELECT * FROM library_all_media WHERE id = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
    if ($result->num_rows == 1) {
        $name = $data['media_title'];
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Media</title>
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
                                <tr>
                                    <td>
                                        <table class="table w-75 mt-3">
                                            <tr>
                                                <td>
                                                    <h1><?php echo $name ?></h1>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 class="mb-4">Do you really want to delete this media?</h3>
                                        <form action="" method="post">
                                            <!-- ### "actions/a_delete.php" ### -->
                                            <input type="hidden" name="id" value="<?php echo $id ?>" />
                                            <button class="btn btn-danger btn-pub" type="submit">Yes, delete it!</button>
                                            <a href="index.php"><button class="btn btn-warning btn-pub" type="button">No, go back!</button></a>
                                        </form>
                                    </td>
                                </tr>
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