<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];

    // ### Select record for details ###

    $sql = "SELECT * FROM locations WHERE id = {$id}";
    $result = $connect->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $id = $data['id'];
        $loc_name = $data['loc_name'];
        $price = $data['price'];
        $descr_short = $data['descr_short'];
        $descr_long = $data['descr_long'];
        $loc_image = $data['loc_image'];
        $longitude = $data['longitude'];
        $latitude = $data['latitude'];
        $wiki_link = $data['wiki_link'];
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
    <title>Location Details</title>

    <!-- ### Add Bootstrap 5.0 & own CSS stylesheet ### -->

    <?php require_once 'components/bootstrap.php' ?>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>

<body>

    <!-- ### Include Header & Navbar ### -->

    <?php include_once 'header.php' ?>
    <?php include_once "navbar.php" ?>
    <div class="container-fluid">
        <div class="row g-4 px-5 mt-2">
            <div class="col-7">

                <!-- ### Location Details Image ### -->

                <div class="card p-3"><img src="<?php echo $loc_image ?>"></div>
            </div>

            <!-- ### Google Maps API container ### -->

            <div class="col-5">
                <div id="map"></div>
            </div>
        </div>

        <!-- ### Location descriptions ### -->

        <div class="row g-4 px-5 mt-2">
            <div class="col">
                <div class="card p-3">
                    <div class="cardTitle"><?php echo $loc_name ?>&nbsp;&nbsp;&nbsp;<small>$<?php echo $price ?></small></div>
                    <div class="cardDshort mt-3"><?php echo $descr_short ?></div>
                    <div class="cardDlong mt-3"><?php echo $descr_long ?></div>
                    <div class="cardWikiSm mt-3"><a href="<?php echo $wiki_link ?>">Wikipedia.com</a></div>
                </div>
            </div>
        </div>

        <!-- ### Navigation buttons ### -->

        <div class="row g-5 px-5 mt-2">
            <div><a href='update.php?id=<?php echo $id ?>'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a><a href='delete.php?id=<?php echo $id ?>'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a><a href="index.php"><button class="btn btn-warning btn-sm" type="button">Back</button></a>
            </div>

            <!-- ### Google Maps API function ### -->

            <script>
                var map;

                function initMap() {
                    var vienna = {
                        lat: <?php echo $longitude ?>,
                        lng: <?php echo $latitude ?>
                    };
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: vienna,
                        zoom: 5
                    });
                    var pinpoint = new google.maps.Marker({
                        position: vienna,
                        map: map
                    });
                }
            </script>

            <script src=" https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
        </div>
</body>

</html>