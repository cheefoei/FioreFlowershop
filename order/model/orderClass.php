<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.


 */

class Order {

    private $customer_id;
    private $total_amount;
    private $status;

    function __construct($customer_id, $total_amount) {
        $this->customer_id = $customer_id;
        $this->total_amount = $total_amount;
    }

    function getCustomer_id() {
        return $this->customer_id;
    }

    function getTotal_amount() {
        return $this->total_amount;
    }

    function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;
    }

    function setTotal_amount($total_amount) {
        $this->total_amount = $total_amount;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
