<?php

/*
 * Name: Leong Chee Foei
 * Group: G6
 */

class InvoiceList {

    private $id;
    private $order_id;
    private $invoice_id;

    function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getOrder_id() {
        return $this->order_id;
    }

    function getInvoice_id() {
        return $this->invoice_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setOrder_id($order_id) {
        $this->order_id = $order_id;
    }

    function setInvoice_id($invoice_id) {
        $this->invoice_id = $invoice_id;
    }
}
