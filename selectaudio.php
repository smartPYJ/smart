<?php
class audio{
    private $conn;
    private $table_name = "audiodownload";
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

    $query = "SELECT * FROM `audiodownload` ORDER BY `audioid` DESC LIMIT 1";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
}
}
