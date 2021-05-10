<?php
    header("Content-Type:application/json");
    require_once("db_check.php");
    
    // Function for delivering a JSON response, can have any name
    function response($status,$data){
        $response['status']=$status;
        $response['data']=$data;
        //Generating JSON from the $response array
        $json_response = json_encode($response);
        // Outputting JSON to the client
        echo $json_response;
    }
    // call the function with parameter 200 and $rows(contains all entries)
    response(200, $rows);
