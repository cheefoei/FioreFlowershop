<?php

/*
 * Name: Leong Chee Foei
 * Group: G6
 * FACADE PATTERN
 */

require_once 'CustomerController.php';

class CustomerServicer {

    private $CustomerController;

    function __construct() {
        $this->CustomerController = new CustomerController();
    }

    function test_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function AuthCustomer($customer) {
        $this->CustomerController->AuthCustomer($customer);
    }

    function CreateCustomer($customer) {
        $this->CustomerController->CreateCustomer($customer);
    }

    function UpdateCustomerProfile($customer) {
        $this->CustomerController->UpdateCustomerProfile($customer);
    }

    function UpdateCustomerPassword($customer, $password) {
        $this->CustomerController->UpdateCustomerPassword($customer, $password);
    }

    function CustomerLogout() {
        $this->CustomerController->CustomerLogout();
    }

    function CreateCustomerXML() {
        $this->CustomerController->CreateCustomerXML();
    }

}
