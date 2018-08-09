<?php
require_once '../JJmodel/Piclup.php';
require_once '../JJmodel/Delivery.php';

class PickupDatabase {

    private $conn;
    private $status = "Done";
    private $deliverystatus = "Delivered";
    private $orderStatus = "Paid";

    function __construct() {
        require_once 'database2.php';
        $db = database::getInstance();
        $this->conn = $db->getConnection();
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
        $query = "SELECT custID FROM self_pickup WHERE orderID='$id'";
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
        $staffID=$newPickup->staffID;
        $query = "UPDATE self_pickup SET pickupDate= '$newdate', paymentDate= '$newdate', payTime= '$time', status='$this->status', staffID='$staffID' where orderID='$newid'";
        $this->_query = $this->conn->prepare($query);
        $this->_query->execute();
    }

}
?>

