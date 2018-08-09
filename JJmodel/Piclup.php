<?php


class Piclup {

    public $pickupdate;
    public $paydate;
    public $orderID;
    public $staffID;
    public $time;

    function getPickupdate() {
        return $this->pickupdate;
    }

    function getPaydate() {
        return $this->paydate;
    }

    function getOrderID() {
        return $this->orderID;
    }

    function getStaffID() {
        return $this->staffID;
    }

    function setPickupdate($pickupdate) {
        $this->pickupdate = $pickupdate;
    }

    function setPaydate($paydate) {
        $this->paydate = $paydate;
    }

    function setOrderID($orderID) {
        $this->orderID = $orderID;
    }

    function setStaffID($staffID) {
        $this->staffID = $staffID;
    }

    function __construct($pickupdate, $paydate, $orderID, $staffID, $time) {
        $this->pickupdate = $pickupdate;
        $this->paydate = $paydate;
        $this->orderID = $orderID;
        $this->staffID = $staffID;
        $this->time = $time;
    }

}

?>
