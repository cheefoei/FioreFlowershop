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

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($customer instanceof Customer) {

            //Check email and password from database
            $stmt = $this->conn->prepare("SELECT * FROM customer WHERE customer_email = :customer_email AND customer_password = :customer_password");
            $stmt->execute(array(':customer_email' => $customer->getEmail(), ':customer_password' => $customer->getPassword()));

            if ($stmt->rowCount() == 1) {
                $_SESSION['customer'] = $customer;
                header("Location: ../../view/customer/CustomerMainPage.php");
            } else {
                $_SESSION['customer_login_error'] = "Your username or password is not correct.";
            }
        }
    }

    function CreateCustomer($customer) {

        $response = array();
        $response["success"] = false;

        if ($customer instanceof Customer) {

            // Check customer is exist
            $check_stmt = $this->conn->prepare("SELECT * FROM customer WHERE customer_email = :customer_email");
            $check_stmt->execute(array(':customer_email' => $customer->getEmail()));

            if ($check_stmt->rowCount() == 0) {

                $customer_array = array(
                    ':customer_type' => $customer->getType(),
                    ':customer_fname' => $customer->getFname(),
                    ':customer_lname' => $customer->getLname(),
                    ':customer_email' => $customer->getEmail(),
                    ':customer_phone_number' => $customer->getPhone_number(),
                    ':customer_address' => $customer->getAddress(),
                    ':customer_password' => $customer->getPassword()
                );

                //Insert new customer into database
                $stmt = $this->conn->prepare("INSERT INTO customer (customer_type, customer_fname, customer_lname, customer_email, customer_phone_number, customer_address, customer_password)"
                        . " VALUES (:customer_type, :customer_fname, :customer_lname, :customer_email, :customer_phone_number, :customer_address, :customer_password);");
                if ($stmt->execute($customer_array)) {
                    $response["success"] = true;
                    $response["msg"] = 'You has been sign up successfully. <a href="">Please log in here. </a>';
                } else {
                    $response["msg"] = "Error occured.";
                }
            } else {
                $response["msg"] = "You already have an account.";
            }
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['customer_reg'] = $response;
    }

    function CustomerLogout() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (session_destroy()) {
            header("Location: ../../index.php");
        }
    }

    function CreateCustomerXML() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $customer = $_SESSION['customer'];

        if ($customer instanceof Customer) {

            $stmt = $this->conn->prepare("SELECT * FROM customer WHERE customer_email = :customer_email");
            $stmt->execute(array(':customer_email' => $customer->getEmail()));

            $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?>'
                    . '<?xml-stylesheet type="text/xsl" href="../../resources/Customer.xsl"?>'
                    . '<customers></customers>');

            while ($row = $stmt->fetch()) {
                $track = $xml->addChild('customer');
                $track->addAttribute('customerID', $row['customer_id']);
                $track->addAttribute('type', $row['customer_type']);
                $track->addChild('name');
                $track->addChild('fname', $row['customer_fname']);
                $track->addChild('lname', $row['customer_lname']);
                $track->addChild('email', $row['customer_email']);
                $track->addChild('phone', $row['customer_phone_number']);
                $track->addChild('address', $row['customer_address']);

                if (strcmp($row['customer_type'], 'corporate')) {
                    $track->addChild('monthlyCreditLimit', $row['customer_monthly_credit_limit']);
                }
            }

            Header('Content-type: text/xml');
            print($xml->asXML());
        }
    }

}
?>
