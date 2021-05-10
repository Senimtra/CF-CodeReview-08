<?php
require_once 'api/RESTful.php';

// ### Selecting all pets that are not yet in the adoptions table ###
// ### Used query => $sql = "SELECT * AS free_pets FROM pets WHERE id NOT IN (SELECT fk_petId FROM adoptions)"

$url = 'https://shallow.codes/FSWDC_CodeReview_11/api/webservice.php';
$result = curl_get($url);
$freePets = json_decode($result, true); //it turns the json into an object
$pets = $freePets['data'];
$tbody = "";
foreach ($pets as $data) {
    $tbody .= "
        <tr>
            <td><img class='img-thumbnail' src='" . $data['image'] . "'</td>
            <td>$data[name]</td>
            <td>$data[age]</td>
            <td>$data[hobbies]</td>
            <td>$data[description]</td>
            <td>
        </tr>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Check</title>

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
                <p class='h2 text-center py-2'>Help our friends on Pet-Adopt!</p>
                <button class="btn btn-sm btn-dark mb-3"><a href="http://shallow.codes/FSWDC_CodeReview_11/php/index.php">API query to my hosted CodeReview11 - Pet Adoption</a></button>
                <table class='table table-striped table-secondary'>
                    <thead class='table'>
                        <tr>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Description</th>
                            <th>Hobbies</th>
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