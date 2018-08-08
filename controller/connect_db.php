<?php

class connect_db {

    private $conn;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "JunKit";

    public function connect() {

        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=' . $this->db, $this->user, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Unable to connect to server.';
        }
        return $this->conn;
    }

}
