<?php
require_once '../JJmodel/Piclup.php';
require_once '../JJmodel/Delivery.php';

class DeliveryDatabase {

    private $conn;
    private $status = "Done";
    private $deliverystatus = "Delivered";
    private $orderStatus = "Paid";

    function __construct() {
        require_once 'database2.php';
        $db = database::getInstance();
        $this->conn = $db->getConnection();
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
    
    

}
