<!-- 
Name: Lim Jun Kit
 Group: G6
-->
<?php
class Delivery{
    
    public $Ddate;
    public $Dtime;
    public $paytime;
    public $orderID;
    public $staffID;
    function getDdate() {
        return $this->Ddate;
    }

    function getDtime() {
        return $this->Dtime;
    }

    function getPaytime() {
        return $this->paytime;
    }

    function getOrderID() {
        return $this->orderID;
    }

    function setDdate($Ddate) {
        $this->Ddate = $Ddate;
    }

    function setDtime($Dtime) {
        $this->Dtime = $Dtime;
    }

    function setPaytime($paytime) {
        $this->paytime = $paytime;
    }

    function setOrderID($orderID) {
        $this->orderID = $orderID;
    }

    function __construct($Ddate, $Dtime, $paytime, $orderID,$staffID) {
        $this->Ddate = $Ddate;
        $this->Dtime = $Dtime;
        $this->paytime = $paytime;
        $this->orderID = $orderID;
        $this->staffID=$staffID;
    }

}

?>