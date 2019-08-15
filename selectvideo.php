<?php
class video{
    private $conn;
    private $table_name = "videodownload";
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

    $query = "SELECT * FROM `videodownload` ORDER BY `videoid` DESC LIMIT 1";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
}
}
