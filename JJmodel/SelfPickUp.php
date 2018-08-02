<?php

class SelfPickUp extends Piclup{
    private $pickupdate;
    
    function __construct($status, $paydate, $orderID, $custID, $staffID,$pickupdate) {
        parent::__construct($status, $paydate, $orderID, $custID, $staffID);
        $this->pickupdate = $pickupdate;
    }
        public function __set($name, $value) {
            if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            parent::__set($name, $value);
        }
    }

    public function __get($name) {
        return $this->$name;
    }

}


