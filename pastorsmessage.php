
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'connector.php';
if ($_SERVER["REQUEST_METHOD"]=='POST')
{
$Topic= $_REQUEST['topic'];
$Message=$_REQUEST['message'];
$Scheduledate=$_REQUEST['scheduledate'];



 $conn = "INSERT INTO `pastors_message` (`topic`,`message`,`scheduledate`) VALUES ('$Topic','$Message','$Scheduledate')";
 $result = mysqli_query($connection , $conn);
}

if ($result){


include 'firebasepastorsmessage.php';


}

// no products found will be here
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found


}
