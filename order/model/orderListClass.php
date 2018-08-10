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

    function __construct( $order_id, $product_id, $quantity) {
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->order_id = $order_id;
    }

    function getOrder_id() {
        return $this->order_id;
    }

    function getProduct_id() {
        return $this->product_id;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function setOrder_id($order_id) {
        $this->order_id = $order_id;
    }

    function setProduct_id($product_id) {
        $this->product_id = $product_id;
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

}
