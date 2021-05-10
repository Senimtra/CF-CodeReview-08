<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ### Add Bootstrap 5.0 & own CSS stylesheet ### -->

    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Add Location</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>

    <!-- ### Include Header & Navbar ### -->

    <?php include_once 'header.php' ?>
    <?php include_once 'navbar.php' ?>
    <fieldset>
        <legend class='h2'>Add Location</legend>
        <form action="actions/a_create.php" method="post">
            <table class='table table-striped table-secondary'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="loc_name" placeholder="Location Name" /></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><input class='form-control' type="number" name="price" placeholder="Price" step="any" /></td>
                </tr>
                <tr>
                    <th>Description | short</th>
                    <td><input class='form-control' type="text" name="descr_short" placeholder="Short description" /></td>
                </tr>
                <tr>
                    <th>Description | long</th>
                    <td><input class='form-control' type="text" name="descr_long" placeholder="Long description" /></td>
                </tr>
                <tr>
                    <th>Wikipedia | Url</th>
                    <td><input class='form-control' type="text" name="wiki_link" placeholder="Wikipedia link" /></td>
                </tr>
                <tr>
                    <th>Longitude</th>
                    <td><input class='form-control' type="number" name="longitude" placeholder="Longitude" step="any" /></td>
                </tr>
                <tr>
                    <th>Latitude</th>
                    <td><input class='form-control' type="number" name="latitude" placeholder="Latitude" step="any" /></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><input class='form-control' type="text" name="loc_image" placeholder="Location image" /></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Location</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>