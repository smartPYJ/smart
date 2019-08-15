<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
include_once 'database.php';
include_once 'message.php';

// instantiate database and sermmon object
$database = new Database();
$db = $database->getConnection();
$event = new Sermon($db);
$stmt = $event->read();
$num = $stmt->rowCount();

if($num>0){

    $event_arr["message"]=array();


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $event_item=array(
           "messageId" => $messageId,
            "topic"=>$topic,
            "message" => html_entity_decode($message),
            "date" => $date,
            "scheduledate"=> $scheduledate

        );


    }


    http_response_code(200);


}
