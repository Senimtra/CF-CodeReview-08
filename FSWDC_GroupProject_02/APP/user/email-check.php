<?php
session_start(); // start a new session or continues the previous

require_once '../components/db_connect.php';

  $q = $_GET["q"];

  $sql = "SELECT email FROM user WHERE email LIKE '$q%'";
  $result = mysqli_query($connect ,$sql);
  //echo $result;

  $output = '';
  if(mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
  } else {
    $output = "no data was found";
  }

  $output = json_encode($output); //encoding the JSON 
  // echo gettype($output); // checking the type
  echo $output; // echoing the output
  
  $connect->close();

?>