<?php

class delivery {

    private $conn;

    function __construct() {
        require_once '../connect_db.php';
        $db = database::getInstance();
        $this->conn = $db->getConnection();
    }

    public function addDelivery($custName, $custID, $orderID, $orderDate, $deliveryAddress, $deliveredDate, $payment) {
        $status = "Pending";
        $stmt = $this->conn->prepare("INSERT INTO delivery(custName,custID,status,orderID, orderDate, deliveryAddress, deliveredDate,Payment) VALUES(?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $custName);
        $stmt->bindParam(2, $custID);
        $stmt->bindParam(3, $status);
        $stmt->bindParam(4, $orderID);
        $stmt->bindParam(5, $orderDate);
        $stmt->bindParam(6, $deliveryAddress);
        $stmt->bindParam(7, $deliveredDate);
        $stmt->bindParam(8, $payment);
        $stmt->execute();
    }

}
