
<?php

$FIREBASE = "https://kingidee-word-of-faith-covenan.firebaseio.com/Eventlist/Conference/";
$NODE_PATCH =".json";
$NODE_PUT = "message.json";

 //$image = $_POST ['image'];
 $message = $_POST["message"];
 $timestamp = $_POST["date"];
 $topic  = $_POST["topic"];

  $data =array(
  "image" => '',
  "message" => '$message' ,
  "timestamp" => '$timestamp',
  "topic" => '$topic'
);
$json = json_encode($data);

$curl = curl_init();

 curl_setopt( $curl, CURLOPT_URL, $FIREBASE . $NODE_PATCH );
curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PATCH" );
curl_setopt( $curl, CURLOPT_POSTFIELDS, $json);


 curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );



$response = curl_exec( $curl );
if ($response){
	echo "Sending Data to firebase in Json format............ <br/>";
	echo "Sending Data to Mysql database in "
curl_close( $curl );
echo $response . "\n";

 ?>
