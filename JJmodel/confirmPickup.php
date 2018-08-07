<?php

//include 'C:\xampp\htdocs\Assignment\model\database.php';
include 'database2.php';
//require '..\\JJmodel\Piclup.php';




try {
    if (isset($_POST['save'])) {
        $testid = $_POST['orderID'];
        $testdate = $_POST['pickupdate'];
        $testdate2 = $_POST['pickupdate'];
        $time=$_POST['pickuptime'];
        $staffID="A1001";
        $newpickup = new Piclup($testdate,$testdate2,$testid,$staffID,$time);
        //$pickupnow= new Piclup($pickupdate, $paydate, $orderID, $staffID);
        //$database = new database();
        //$database = database::getInstance();
        $database = Database::getInstance()->update($newpickup);
       // $database3 = Database::getInstance()->update($pickupnow);
        $database2 = Database::getInstance()->updateOrder($testid);
        echo"Customer Pickup The Order.<br>";
        echo"Pickup Date $testdate";
        echo '<a href="..\JJview\View.php">Back to Confirm Delivered</a>';
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>

