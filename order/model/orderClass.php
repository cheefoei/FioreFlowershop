<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 

*/
class Order {

    public $customer_id;
    public $total_amount;

    
    public function __construct($customer_id, $total_amount) {
        $this->customer_id = $customer_id;
        $this->total_amount = $total_amount;
    }


}
    