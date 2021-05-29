<?php

/****************************************
*######## RESTful WEB SERVICE ##########*
*                                       *
* Client process the request VIA URL    *
* http://address.com/webservice.php?id=1*
* and gets the JSON result.             *
****************************************/
// Set Content-Type header to application/json
header("Content-Type:application/json");

if(!empty($_GET['id'])){
   $id=$_GET['id'];
   $week = $_GET['week'];
require_once("db_check.php");
response ($row);
}

function response($response){
   $json_response=json_encode($response);
   echo $json_response;
}
?>