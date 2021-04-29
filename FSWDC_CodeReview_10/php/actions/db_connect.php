<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cr10-gregor-biglibrary";

$connect = mysqli_connect($hostname, $username, $password, $dbname);

// ### Check connection status

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} else {
    // echo "Connected!";
}
