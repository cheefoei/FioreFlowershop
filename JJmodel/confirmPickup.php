<?php

//include 'C:\xampp\htdocs\Assignment\model\database.php';
include 'C:\xampp\htdocs\Assignment\JJmodel\database2.php';




try {
    if (isset($_POST['save'])) {
        $testid = $_POST['orderID'];
        $testdate = $_POST['pickupdate'];
        $testdate2 = $_POST['pickupdate'];
        $time=$_POST['pickuptime'];
        //$database = new database();
        //$database = database::getInstance();
        $database = Database::getInstance()->update($testdate,$testdate2,$testid,$time);
        $database2 = Database::getInstance()->updateOrder($testid);
        echo"Customer Pickup The Order.<br>";
        echo"Pickup Date $testdate";
        echo '<a href="..\JJview\View.php">Back to Confirm Delivered</a>';
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

?>

