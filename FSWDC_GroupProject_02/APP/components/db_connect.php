<?php
$servername = "212.227.165.204";
$username = "team7";
$password = "testtest";
$dbname = "be_team7_mealplanner";

// create connection
$connect = new  mysqli($servername, $username, $password, $dbname);


// check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}

// <?php
// $servername = "127.0.0.1";
// $username = "root";
// $password = "";
// $dbname = "be_team7_mealplanner";

// // create connection
// $connect = new  mysqli($servername, $username, $password, $dbname);


// // check connection
// if ($connect->connect_error) {
//   die("Connection failed: " . $connect->connect_error);
// }
