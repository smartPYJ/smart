<?php
class Sermon{

    // database connection and table name
    private $conn;
    private $table_name = "pastors_message";



    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

    // select all query

    $query = "SELECT * FROM `pastors_message` ORDER BY `messageId` DESC LIMIT 1";


    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
}
}
