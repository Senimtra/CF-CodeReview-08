<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];

    // ### Select record for details ###

    $sql = "SELECT * FROM library_all_media WHERE id = {$id}";
    $result = $connect->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $media_title = $data['media_title'];
        $media_type = $data['media_type'];
        $media_date = $data['media_date'];
        $media_isbn = $data['media_isbn'];
        $media_descr = $data['media_descr'];
        $media_image = $data['media_image'];
        $media_status = $data['media_status'];
        $author_fname = $data['author_fname'];
        $author_lname = $data['author_lname'];
        $pub_name = $data['pub_name'];
        $pub_address = $data['pub_address'];
        $pub_size = $data['pub_size'];
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
    <title>Media Details</title>
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
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="card p-3 m-3">
                                                <div class="row g-0">
                                                    <div class="col-md-4 cardImg">
                                                        <img src="<?php echo $media_image ?>" alt="...">
                                                    </div>
                                                    <div class="col-md"></div>
                                                    <div class="col-md-7">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $media_title ?></h5>
                                                            <p class="card-text"><?php echo $author_fname ?>&nbsp;<?php echo $author_lname ?>,&nbsp;<?php echo $media_date ?>,&nbsp;<?php echo $media_type ?></p>
                                                            <p class="card-text"><?php echo $media_descr ?></p>
                                                            <p class="card-text">
                                                            <div class="publisher d-flex">
                                                                <div>Publisher:&nbsp;&nbsp;&nbsp;</div>
                                                                <div><?php echo $pub_name ?><br><?php echo $pub_address ?></div>
                                                            </div>
                                                            </p>
                                                            <p class="card-text">Publisher size: <?php echo $pub_size ?></p>
                                                            <p class="card-text">ISBN: <?php echo $media_isbn ?></p>
                                                            <p class="card-text"><strong class="text-muted">Status: <?php echo $media_status ?>&nbsp;&nbsp;|&nbsp;&nbsp;id: <?php echo $id ?></strong></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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