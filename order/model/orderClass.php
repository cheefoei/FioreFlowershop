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

    
    public function __construct($customer_id, $total_amount, $status) {
        $this->customer_id = $customer_id;
        $this->total_amount = $total_amount;
        $this->status = $status;
    }
    public function getCustomer_id() {
        return $this->customer_id;
    }

    public function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;
    }

        public function getTotal_amount() {
        return $this->total_amount;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setTotal_amount($total_amount) {
        $this->total_amount = $total_amount;
    }

    public function setStatus($status) {
        $this->status = $status;
    }



}
    