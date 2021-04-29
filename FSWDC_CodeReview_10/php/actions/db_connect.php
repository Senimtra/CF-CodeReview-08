<?php

$hostname = "";
$username = "";
$password = "";
$dbname = "";

$connect = mysqli_connect($hostname, $username, $password, $dbname);

// ### Check connection status

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} else {
    // echo "Connected!";
}
