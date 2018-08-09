<?php

/*
 * Name: Leong Chee Foei
 * Group: G6
 */

class Invoice {

    private $id;
    private $month;
    private $year;
    private $date_created;
    private $total;
    private $isPaid;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getMonth() {
        return $this->month;
    }

    function getYear() {
        return $this->year;
    }

    function getDate_created() {
        return $this->date_created;
    }

    function getTotal() {
        return $this->total;
    }

    function getIsPaid() {
        return $this->isPaid;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMonth($month) {
        $this->month = $month;
    }

    function setYear($year) {
        $this->year = $year;
    }

    function setDate_created($date_created) {
        $this->date_created = $date_created;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setIsPaid($isPaid) {
        $this->isPaid = $isPaid;
    }

}
