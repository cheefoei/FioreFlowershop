<?php

require '../JJmodel/Piclup.php';
require '../JJmodel/Delivery.php';

class DeliveryDatabase {

    private static $instance = null;
    private $conn;
    private $host = 'localhost';
    private $dbName = 'JunKit';
    private $dbuser = 'root';
    private $dbpassword = '';
    private $status = "Done";
    private $deliverystatus = "Delivered";
    private $orderStatus = "Paid";

    // The db connection is established in the private constructor.
    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};
    dbname={$this->dbName}", $this->dbuser, $this->dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        } catch (PDOException $ex) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DeliveryDatabase();
        }

        return self::$instance;
    }

    private function __clone() {
        
    }

    public function getConnection() {
        return $this->conn;
    }

    public function query2() {
        $query = "SELECT * FROM delivery";
        if ($this->_query = $this->conn->prepare($query)) {
            if ($this->_query->execute()) {
                $result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }

    public function query4($id) {
        $query = "SELECT custID,custName FROM delivery WHERE orderID='$id'";
        if ($this->_query = $this->conn->prepare($query)) {
            if ($this->_query->execute()) {
                $result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }

}
