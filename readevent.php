<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
include_once 'database.php';
include_once 'event.php';

// 
$database = new Database();
$db = $database->getConnection();

// initialize object
$event = new Event($db);

// read products will be here
$stmt = $event->read();
$num = $stmt->rowCount();



// check if more than 0 record found
if($num>=1){

    // products array
    $event_arr=array();
    $event_arr["records"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $event_item=array(
            "id" => $id,
            "Event_type"=>$Event_type,
            "Event_date" => $Event_date,
            "Event_venue" => $Event_venue,
            "Event_time" => $Event_time

            //"Event_image" => $Event_image
        );

        array_push($event_arr["records"], $event_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($event_arr);
}


// no products found will be here
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No Event found.")
    );
}
