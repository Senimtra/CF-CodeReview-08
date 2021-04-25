<?php

$hostname = "db5002324578.hosting-data.io";
$username = "dbu1343532";
$password = "N85cNbvnu+zV2vp";
$dbname = "dbs1869090";

$connect = mysqli_connect($hostname, $username, $password, $dbname);

// ### Check connection status

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} else {
    // echo "Connected!";
}
