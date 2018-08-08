<?php

include_once  '../JJmodel/Piclup.php';
require_once '../JJmodel/Delivery.php';

class PickupDatabase {

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
            self::$instance = new PickupDatabase();
        }

        return self::$instance;
    }

    private function __clone() {
        
    }

    public function getConnection() {
        return $this->conn;
    }

    public function query() {
        $query = "SELECT * FROM self_pickup";
        if ($this->_query = $this->conn->prepare($query)) {
            if ($this->_query->execute()) {
                $result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }

    public function query3($id) {
        $query = "SELECT custID,custName FROM self_pickup WHERE orderID='$id'";
        if ($this->_query = $this->conn->prepare($query)) {
            if ($this->_query->execute()) {
                $result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }

    public function update($newPickup) {
        //$newpickup = new Piclup();
        $newstaffID = $newPickup->staffID;
        $newdate = $newPickup->paydate;
        $newid = $newPickup->orderID;
        $time = $newPickup->time;
        $query = "UPDATE self_pickup SET pickupDate= '$newdate', paymentDate= '$newdate', payTime= '$time', status='$this->status' where orderID='$newid'";
        $this->_query = $this->conn->prepare($query);
        $this->_query->execute();
    }

}
?>

