<?php

class connect_db {
    private $conn;
    private $conn2;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "floralassignment_db";

    // Connecting to database
    public function connect() {

        // Connecting to mysql database
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
        // return database object
        return $this->conn;
    }

    public function connectPDO(){
        $this->conn2 = new PDO('mysql:host=localhost;dbname=floralassignment_db', $this->user, $this->password);

        // set the PDO error mode to exception
        //$this->conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn2;
    }
}
?>