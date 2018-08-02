<?php

abstract class Piclup{
    private $status;
    private $paydate;
    private $orderID;
    private $custID;
    private $staffID;
    
    public function __construct($status, $paydate, $orderID, $custID, $staffID) {
        $this->status = $status;
        $this->paydate = $paydate;
        $this->orderID = $orderID;
        $this->custID = $custID;
        $this->staffID = $staffID;
    }
    function getStatus() {
        return $this->status;
    }

    function getPaydate() {
        return $this->paydate;
    }

    function getOrderID() {
        return $this->orderID;
    }

    function getCustID() {
        return $this->custID;
    }

    function getStaffID() {
        return $this->staffID;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setPaydate($paydate) {
        $this->paydate = $paydate;
    }

    function setOrderID($orderID) {
        $this->orderID = $orderID;
    }

    function setCustID($custID) {
        $this->custID = $custID;
    }

    function setStaffID($staffID) {
        $this->staffID = $staffID;
    }



    
}
?>
