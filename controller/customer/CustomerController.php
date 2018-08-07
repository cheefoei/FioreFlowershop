<?php

/*
 * Name: Leong Chee Foei
 * Group: G6
 */

require_once '../../controller/connect_db.php';
require_once '../../model/customer.php';

class CustomerController {

    private $conn;

    function __construct() {

        $db = new connect_db();
        $this->conn = $db->connect();
    }

    function test_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function AuthCustomer($customer) {

        if (isPostRequest()) {
            
        }
    }

}
?>
