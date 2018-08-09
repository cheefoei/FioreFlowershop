<?php
require_once 'DeliveryDatabase.php';
require_once 'OrderDatabase.php';
require_once 'PickupDatabase.php';

class Facade {

//put your code here
    private $Order;
    private $Delivery;
    private $Pickup;

    function __construct() {
        $this->Order = new Order();
        $this->Delivery = new DeliveryDatabase();
        $this->Pickup = new PickupDatabase;
    }

//Function for the Update
    public function UpdateOrder($id) {
        return $this->Order->updateOrder($id);
    }

    public function RetrieveOrder() {
        return $this->Order->query5();
    }

    //Fucntion for the Delivery

    public function UpdateDelivery($newDelivery) {
        return $this->Delivery->updateDelivery($newDelivery);
    }

    public function RetrieveDelivery() {
        return $this->Delivery->query2();
    }

    public function SelectDelivery($id) {
        return $this->Delivery->query4($id);
    }

    //Function for the Self Pickup
    public function UpdatePickup($newPickup) {
        return $this->Pickup->update($newPickup);
    }

    public function RetrievePickup() {
        return $this->Pickup->query();
    }

    public function SelectPickup($id) {
        return $this->Pickup->query3($id);
    }

}

?>
