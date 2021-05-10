<?php
// Require conn.php (DB connection) file
require_once("conn.php");

// query all data fro db

if (isset($_GET["id"])) {
    $id = ($_GET["id"] == "all") ? "" : " WHERE id= " . $_GET["id"];
} else {
    $id = "";
}
$sql = "SELECT * FROM locations $id";

$result = mysqli_query($conn, $sql);

// put all results in the rows array
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the DB connection
mysqli_close($conn);
