<?php
class book{
    private $conn;
    private $table_name = "bookdownload";
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

    $query = "SELECT * FROM `bookdownload` ORDER BY `bookid` DESC LIMIT 1";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
}
}
