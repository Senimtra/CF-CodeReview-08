<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Media</title>
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

                                <!-- ### Create form begins here ### -->

                                <form action="" method="post">
                                    <!-- ### "actions/a_create.php" ### -->
                                    <table class="table table-striped mb-0">
                                        <tr>
                                            <td colspan="2">
                                                <legend class='h2'>Add Media</legend>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Media Name</th>
                                            <td><input class='form-control' type="text" name="m_name" placeholder="Name of the media" /></td>
                                        </tr>
                                        <tr>
                                            <th>Media Type</th>
                                            <td><input class='form-control' type="text" name="m_type" placeholder="Type of the media" /></td>
                                        </tr>
                                        <tr>
                                            <th>Release (Year)</th>
                                            <td><input class='form-control' type="number" name="m_date" placeholder="Year of release" /></td>
                                        </tr>
                                        <tr>
                                            <th>ISBN-code</th>
                                            <td><input class='form-control' type="text" name="m_isbn" placeholder="ISBN-code of the media" /></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td><input class='form-control' type="text" name="m_descr" placeholder="Short description" /></td>
                                        </tr>
                                        <tr>
                                            <th>Image (Url)</th>
                                            <td><input class='form-control' type="text" name="m_image" placeholder="Image-Url of the media" /></td>
                                        </tr>
                                        <tr>
                                            <th>Availability</th>
                                            <td><input class='form-control' type="text" name="m_status" placeholder="available / reserved" /></td>
                                        </tr>
                                        <tr>
                                            <th>Author first name</th>
                                            <td><input class='form-control' type="text" name="a_fname" placeholder="First name of the author" /></td>
                                        </tr>
                                        <tr>
                                            <th>Author last name</th>
                                            <td><input class='form-control' type="text" name="a_lname" placeholder="Last name of the author" /></td>
                                        </tr>
                                        <tr>
                                            <th>Publisher name</th>
                                            <td><input class='form-control' type="text" name="p_name" placeholder="Name of the publisher" /></td>
                                        </tr>
                                        <tr>
                                            <th>Publisher address</th>
                                            <td><input class='form-control' type="text" name="p_address" placeholder="Address of the publisher" /></td>
                                        </tr>
                                        <tr>
                                            <th>Publisher size</th>
                                            <td><input class='form-control' type="text" name="p_size" placeholder="Size of the publisher" /></td>
                                        </tr>
                                        <tr>
                                            <td><button class='btn btn-success btn-pub' type="submit">Insert media</button></td>
                                            <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
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