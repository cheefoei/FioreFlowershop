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
        //echo"Pickup Date $testdate <br>";
        //echo '<a href="..\JJview\viewDelivery.php">Back to Confirm Delivered</a>';
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
        echo "<p>The Original Delivery Status is: {$status}</p>";
    }

    public function update() {
        $this->p = $this->getPickup();
        echo "<p>The Updated Status of the Order is : Done</p>";
        echo "<p>The Updated Delivered date of the Order is : {$this->p}</p>";
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