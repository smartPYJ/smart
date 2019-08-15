<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include'connector.php';
if ($_SERVER["REQUEST_METHOD"]=='POST')
{
 $Event_type = $_REQUEST ['eventtype'];
     $Event_date = $_REQUEST ['eventdate'];
      $Event_venue = $_REQUEST ['eventvenue'];
       $Event_time = $_REQUEST ['eventtime'];




 $conn = "INSERT INTO `event` (`Event_type`,`Event_date`,`Event_venue`,`Event_time`) VALUES ('$Event_type','$Event_date','$Event_venue', '$Event_time')";
 $result = mysqli_query($connection , $conn);
}

if ($result){
	echo json_encode(array( "event updataed   ".  http_response_code(200)));
include 'firebaseevent.php';

}

else{

    // set response code - 404 Not found
    http_response_code(404);


    echo json_encode(
        array( "No Event Uploaded.")
    );
}

mysqli_close($connection);
