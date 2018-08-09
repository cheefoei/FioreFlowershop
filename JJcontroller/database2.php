<?php

require '../JJmodel/Piclup.php';
require '../JJmodel/Delivery.php';

class Database {

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
            self::$instance = new Database();
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

    public function query2() {
        $query = "SELECT * FROM delivery";
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

    public function query4($id) {
        $query = "SELECT custID,custName FROM delivery WHERE orderID='$id'";
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
        $time=$newPickup->time;
        $id=$newPickup->staffID;
        $query = "UPDATE self_pickup SET pickupDate= '$newdate', paymentDate= '$newdate', payTime= '$time', staffID='$id',status='$this->status' where orderID='$newid'";
        $this->_query = $this->conn->prepare($query);
        $this->_query->execute();
    }

    public function updateDelivery($newDelivery) {
        $testdate=$newDelivery->Ddate;
        $testdate2=$newDelivery->paytime;
        $time=$newDelivery->Dtime;
        $id=$newDelivery->orderID;
        $staffid=$newDelivery->staffID;
        $query = "UPDATE delivery SET deliveredDate= '$testdate', paymentDate= '$testdate2', payTime= '$time', status='$this->deliverystatus',StaffID='$staffid' where orderID='$id'";
        $this->_query = $this->conn->prepare($query);
        $this->_query->execute();
    }

    public function updateOrder($id) {
        $query = "UPDATE floral_order SET status='$this->orderStatus' where id='$id'";
        $this->_query = $this->conn->prepare($query);
        $this->_query->execute();
    }

    public function query5() {
        $query = "SELECT * FROM floral_order";
        if ($this->_query = $this->conn->prepare($query)) {
            if ($this->_query->execute()) {
                $result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        return $result;
    }

}

?>
