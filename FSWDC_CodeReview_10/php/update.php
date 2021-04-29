<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];

    // ### Select record (update) ###

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
    <title>Update Media</title>
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
                            <fieldset>

                                <!-- ### Update form begins here ### -->

                                <form action="" method="post">
                                    <!-- ### "actions/a_update.php" ### -->
                                    <table class="table table-striped mb-0">
                                        <tr>
                                            <td colspan="2">
                                                <legend class='h2'>Update Media</legend>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Media Name</th>
                                            <td><input class='form-control' type="text" name="m_name" placeholder="Name of the media" value="<?php echo $media_title ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Media Type</th>
                                            <td><input class='form-control' type="text" name="m_type" placeholder="Type of the media" value="<?php echo $media_type ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Release (Year)</th>
                                            <td><input class='form-control' type="number" name="m_date" placeholder="Year of release" value="<?php echo $media_date ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>ISBN-code</th>
                                            <td><input class='form-control' type="text" name="m_isbn" placeholder="ISBN-code of the media" value="<?php echo $media_isbn ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><input class='form-control' type="text" name="m_descr" placeholder="Short description" value="<?php echo $media_descr ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Image (Url)</th>
                                            <td><input class='form-control' type="text" name="m_image" placeholder="Image-Url of the media" value="<?php echo $media_image ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Availability</th>
                                            <td><input class='form-control' type="text" name="m_status" placeholder="available / reserved" value="<?php echo $media_status ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Author first name</th>
                                            <td><input class='form-control' type="text" name="a_fname" placeholder="First name of the author" value="<?php echo $author_fname ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Author last name</th>
                                            <td><input class='form-control' type="text" name="a_lname" placeholder="Last name of the author" value="<?php echo $author_lname ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Publisher name</th>
                                            <td><input class='form-control' type="text" name="p_name" placeholder="Name of the publisher" value="<?php echo $pub_name ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Publisher address</th>
                                            <td><input class='form-control' type="text" name="p_address" placeholder="Address of the publisher" value="<?php echo $pub_address ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Publisher size</th>
                                            <td><input class='form-control' type="text" name="p_size" placeholder="Size of the publisher" value="<?php echo $pub_size ?>" /></td>
                                        </tr>
                                        <tr>
                                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                                            <input type="hidden" name="picture" value="<?php echo $data['media_image'] ?>" />
                                            <td><button class="btn btn-success btn-pub" type="submit">Save Changes</button></td>
                                            <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                                        </tr>
                                    </table>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "footer.php" ?>
</body>

</html>