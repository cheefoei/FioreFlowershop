<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * 
 */

class OrderList {

    private $order_id;
    private $product_id;
    private $quantity;

    public function __construct(int $order_id, int $product_id, int $quantity) {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->order_id = $order_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getOrder_id() {
        return $this->order_id;
    }

    public function getProduct_id() {
        return $this->product_id;
    }

    public function setQuantity(int $quantity) {
        $this->quantity = $quantity;
    }
    
    public function addQuantity(int $quantity) {
        $this->quantity = $this->quantity + $quantity;
    }

}
