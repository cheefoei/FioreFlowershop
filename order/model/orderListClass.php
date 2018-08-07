<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * 
 */

class OrderList {

    public $order_id;
    public $product_id;
    public $quantity;

    public function __construct(int $order_id, int $product_id, int $quantity) {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->order_id = $order_id;
    }

}
