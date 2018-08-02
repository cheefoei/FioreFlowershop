<?php

class Delivery {

    private $deliverydate;

    function __construct($status, $paydate, $orderID, $custID, $staffID, $deliverydate) {
        parent::__construct($status, $paydate, $orderID, $custID, $staffID);
        $this->deliverydate = $deliverydate;
    }

    public function set($name, $value) {
        if (property_exists($this, $name))
            $this->$name = $value;
        else
            parent::__set($name, $value);
    }

    public function get($name) {
        return $this->$name;
    }

}
?>

