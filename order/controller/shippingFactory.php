<?php
require 'pickUpClass.php';
require 'deliveryClass.php';

class shippingFactory {
 
  protected $shipping;
  
  // Determine which model to manufacture, and instantiate 
  //  the concrete classes that make each model.
  public function make($method=null)
  {
    if(strtolower($method) == 'delivery')
      return $this->shipping = new Delivery();
  
    return $this->shipping = new PickUp();
  }
}