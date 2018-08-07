<?php

include 'C:\xampp\htdocs\FioreFlowershop\JJmodel\database2.php';

try {
    if (isset($_POST['update'])) {
        $testid = $_POST['orderID'];
        $testdate = $_POST['deliveredDate'];
        $testdate2 = $_POST['deliveredDate'];
        $time = $_POST['deliveredTime'];
        //$database = new database();
        //$database = database::getInstance();
        $newDelivery = new Delivery($testdate, $time, $testdate2, $testid);
        $database = Database::getInstance()->updateDelivery($newDelivery);
        $database2 = Database::getInstance()->updateOrder($testid);
        echo"The Order is Delivered.<br>";
        $datesSimulator = new dateSimulator();

        $pickup1 = new Pound('Pending');
//$currency2 = new Yen(122);

        $datesSimulator->addPickup($pickup1);
//$priceSimulator->addCurrency($currency2);

        echo "<hr />";
        $datesSimulator->updatestatus();
        //echo"Pickup Date $testdate <br>";
        //echo '<a href="..\JJview\viewDelivery.php">Back to Confirm Delivered</a>';
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}



?>