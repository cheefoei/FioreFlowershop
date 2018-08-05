<?php

class connect_db {

    private $conn;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "flowershop_db";

    // Connecting to database
    public function connect() {
        $this->conn = new PDO('mysql:host=localhost;dbname=' . $this->db, $this->user, $this->password);

        // set the PDO error mode to exception
        //$this->conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn;
    }

}
