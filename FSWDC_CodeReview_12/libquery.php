<?php
require_once 'api/RESTful.php';

// ### Selecting all available media ###
// ### Used query => $sql = "SELECT * FROM library_all_media WHERE media_status = 'available'"

$url = 'https://shallow.codes/FSWDC_CodeReview_10/api/webservice.php';
$result = curl_get($url);
$freeMedia = json_decode($result, true); //it turns the json into an object
$media = $freeMedia['data'];
$tbody = "";
foreach ($media as $data) {
    $tbody .= "
        <tr>
            <td><img class='img-thumbnail' src='" . $data['media_image'] . "'</td>
            <td>$data[media_title]</td>
            <td>$data[media_date]</td>
            <td>$data[media_type]</td>
            <td>$data[media_status]</td>
            <td>
        </tr>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Media Check</title>

    <!-- ### Add Bootstrap 5.0 & own CSS stylesheet ### -->

    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>

    <!-- ### Including Header & Navbar ### -->

    <?php include_once 'header.php' ?>
    <?php include_once 'navbar.php' ?>
    <div class="container-fluid px-5">
        <div class="row">
            <div class="card mt-5 py-4 px-3">
                <p class='h2 text-center py-2'>Available media on our Partner-Website!</p>
                <button class="btn btn-sm btn-dark mb-3"><a href="http://shallow.codes/FSWDC_CodeReview_10/php/index.php">API query to my hosted CodeReview10 - Big Library</a></button>
                <table class='table table-striped table-secondary'>
                    <thead class='table'>
                        <tr>
                            <th>Picture</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Media</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- ### Content Output ### -->

                        <?= $tbody; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ### Including footer ### -->

    <?php include_once 'footer.php' ?>
</body>

</html>