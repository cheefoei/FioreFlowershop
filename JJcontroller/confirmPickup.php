<?php

//include 'C:\xampp\htdocs\Assignment\model\database.php';
include 'database2.php';

//require '..\\JJmodel\Piclup.php';




try {
if (isset($_POST['save'])) {
$testid = $_POST['orderID'];
$testdate = $_POST['pickupdate'];
$testdate2 = $_POST['pickupdate'];
$time = $_POST['pickuptime'];
$staffID = "A1001";
$newpickup = new Piclup($testdate, $testdate2, $testid, $staffID, $time);
//$pickupnow= new Piclup($pickupdate, $paydate, $orderID, $staffID);
//$database = new database();
//$database = database::getInstance();
$database = Database::getInstance()->update($newpickup);
// $database3 = Database::getInstance()->update($pickupnow);
$database2 = Database::getInstance()->updateOrder($testid);
echo"Customer Pickup The Order.<br>";
//echo"Pickup Date change from null to";
//echo '<a href="..\JJview\View.php">Back to Confirm Delivered</a>';

}
} catch (PDOException $e) {
die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

interface Observer {

public function addPickup(Pickup $pickup);
}

class dateSimulator implements Observer {

private $pickup;

public function __construct() {
$this->pickup = array();
}

public function addPickup(Pickup $pickup) {
array_push($this->pickup, $pickup);
}

public function updatestatus() {
foreach ($this->pickup as $pickup) {
$pickup->update();
}
}

}

interface Pickup {

public function update();

public function getPickup();
}

class Pound implements Pickup {

private $p;

public function __construct($status) {
$this->p = $status;
echo "<p>The Original Pickup Status is: {$status}</p>";
}

public function update() {
$this->p = $this->getPickup();
echo "<p>The Updated Status of the Order is : Done</p>";
echo "<p>The Updated Pickup date of the Order is : {$this->p}</p>";
}

public function getPickup() {
return return_date();
}
}

function return_date() {
date_default_timezone_set("Asia/Kuala_Lumpur");
$testdate2 = trim(date("Y-m-d"));
return $testdate2;

}
$datesSimulator = new dateSimulator();

$pickup1 = new Pound('Pending');
//$currency2 = new Yen(122);

$datesSimulator->addPickup($pickup1);
//$priceSimulator->addCurrency($currency2);

echo "<hr />";
$datesSimulator->updatestatus();
?>

