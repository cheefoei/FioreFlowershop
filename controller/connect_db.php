<?php

class connect_db {

    private static $instance = null;
    private $conn;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "flowershop_db";

    private function __construct() {

        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=' . $this->db, $this->user, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Unable to connect to server.';
        }
        return $this->conn;
    }

    public static function getDatabaseInstance() {

        if (!self::$instance) {
            self::$instance = new connect_db();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

}
