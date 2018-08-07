<?php

class pickUp{

    private $conn;

    function __construct() {
        require_once '../connect_db.php';
        $db = database::getInstance();
        $this->conn = $db->getConnection();
    }
    public function addPickUp($custName, $custID, $orderID, $orderDate, $pickupDate, $payment) {
        $status = "Pending";
        $stmt = $this->conn->prepare("INSERT INTO self_pickup(custName,custID,status,OrderID, orderDate, pickupDate,Payment) VALUES(?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $custName);
        $stmt->bindParam(2, $custID);
        $stmt->bindParam(3, $status);
        $stmt->bindParam(4, $orderID);
        $stmt->bindParam(5, $orderDate);
        $stmt->bindParam(6, $pickupDate);
        $stmt->bindParam(7, $payment);
        $stmt->execute();
    }
    
}