<?php

require_once '../../controller/CustomerServicer.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['customer'])) {
    header("Location: ../../index.php");
}

$year_month = $_SESSION['year_month'];
$month = $year_month['month'];
$year = $year_month['year'];
unset($_SESSION['year_month']);

$curr_m = date('m');
$curr_y = date('Y');

if ($curr_y == $year && $curr_m <= $month) {
    echo 'No yet generate invoice';
} else {
    $CustomerServicer = new CustomerServicer();
    $CustomerServicer->PrepareInvoice($month, $year);
}