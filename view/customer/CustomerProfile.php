<?php

require_once '../../controller/CustomerServicer.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['customer'])) {
    header("Location: ../../index.php");
}

$CustomerServicer = new CustomerServicer();
$CustomerServicer->CreateCustomerXML();

