<?php
require 'shippingFactory.php';

class Shipping {
  protected $shipping;
  
  // First, create the carFactory object in the constructor.
  public function __construct()
  {
    $this->shipping = new shippingFactory();
  }
  
  public function shipping($method=null)
  {
    // Use the make() method from the carFactory.
    $this->shipping = $this->shipping->make($method);
  }
  
  public function getShippingMethod()
  {
    return $this->shipping;
  }
}