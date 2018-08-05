<?php

/*
 * Name: Leong Chee Foei
 * Group: G6
 */

class customer {

    private $id;
    private $type;
    private $name;
    private $email;
    private $phone_number;
    private $address;
    private $monthly_credit_limit;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getType() {
        return $this->type;
    }

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone_number() {
        return $this->phone_number;
    }

    function getAddress() {
        return $this->address;
    }

    function getMonthly_credit_limit() {
        return $this->monthly_credit_limit;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhone_number($phone_number) {
        $this->phone_number = $phone_number;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setMonthly_credit_limit($monthly_credit_limit) {
        $this->monthly_credit_limit = $monthly_credit_limit;
    }

}
