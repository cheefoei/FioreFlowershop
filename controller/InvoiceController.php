<?php

/*
 * Name: Leong Chee Foei
 * Group: G6
 */

require_once '../../controller/connect_db.php';
require_once '../../model/Customer.php';

class InvoiceController {

    private $conn;

    function __construct() {

        $db = new connect_db();
        $this->conn = $db->connect();
    }

    function PrepareInvoice($month, $year) {

        // Get customer ID
        $customer = $_SESSION['customer'];
        $customer_id = null;
        if ($customer instanceof Customer) {
            $customer_id = $customer->getId();
        }

        //Check invoice available
        $check_stmt = $this->conn->prepare("SELECT * FROM invoice WHERE customer_id=:customer_id AND invoice_month = :invoice_month AND invoice_year = :invoice_year");
        $check_stmt->execute(array(':customer_id' => $customer_id, ':invoice_month' => $month, ':invoice_year' => $year));

        // If no invoice
        if ($check_stmt->rowCount() == 0) {

            $order_stmt = $this->conn->prepare("SELECT order_list.id, DATE_FORMAT(floral_order.date, '%d %M %Y') AS 'order_date', product.product_name, product.price, order_list.quantity,  (product.price * order_list.quantity) AS 'total_amount' "
                    . " FROM floral_order, order_list, product "
                    . "WHERE order_list.order_id = floral_order.id AND order_list.product_id = product.product_id AND customer_id = :customer_id AND YEAR(`date`) = :year AND MONTH(`date`) = :month "
                    . "ORDER BY floral_order.date;");
            $order_stmt->execute(array(':customer_id' => $customer_id, ':year' => $year, ':month' => $month));

            $invoice_total_amount = 0;
            while ($row = $order_stmt->fetch()) {
                $invoice_total_amount += $row['total_amount'];
            }

            $invoice_array = array(
                ':customer_id' => $customer_id,
                ':invoice_month' => $month,
                ':invoice_year' => $year,
                ':invoice_total_amount' => $invoice_total_amount
            );

            // Insert new invoice
            $invoice_stmt = $this->conn->prepare("INSERT INTO invoice (customer_id, invoice_month, invoice_year, invoice_total_amount)"
                    . " VALUES (:customer_id, :invoice_month, :invoice_year, :invoice_total_amount);");
            $invoice_stmt->execute($invoice_array);

            // Insert invoice list
            $invoice_id = $this->conn->lastInsertId();
            $order_stmt->execute(array(':customer_id' => $customer_id, ':year' => $year, ':month' => $month));
            while ($row = $order_stmt->fetch()) {

                $invoice_list_stmt = $this->conn->prepare("INSERT INTO invoice_list (invoice_id, order_id)"
                        . " VALUES (:invoice_id, :order_id);");
                $invoice_list_array = array(
                    ':invoice_id' => $invoice_id,
                    ':order_id' => $row['id']
                );
                $invoice_list_stmt->execute($invoice_list_array);
            }
        }

        //Get invoice
        $invoice_stmt = $this->conn->prepare("SELECT * FROM invoice WHERE customer_id=:customer_id AND invoice_month = :invoice_month AND invoice_year = :invoice_year");
        $invoice_stmt->execute(array(':customer_id' => $customer_id, ':invoice_month' => $month, ':invoice_year' => $year));

        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?>'
                . '<?xml-stylesheet type="text/xsl" href="../../resources/Invoice.xsl"?>'
                . '<!DOCTYPE customers SYSTEM "../../resources/Invoice.dtd">'
                . '<invoices></invoices>');
    }

    function CreateCustomerXML() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $customer = $_SESSION['customer'];

        if ($customer instanceof Customer) {

            $stmt = $this->conn->prepare("SELECT * FROM customer WHERE customer_email = :customer_email");
            $stmt->execute(array(':customer_email' => $customer->getEmail()));


            while ($row = $stmt->fetch()) {
                $track = $xml->addChild('customer');
                $track->addAttribute('customerID', $row['customer_id']);
                $track->addAttribute('type', $row['customer_type']);
                $name = $track->addChild('name');
                $name->addChild('fname', $row['customer_fname']);
                $name->addChild('lname', $row['customer_lname']);
                $track->addChild('email', $row['customer_email']);
                $track->addChild('phone', $row['customer_phone_number']);
                $track->addChild('address', $row['customer_address']);

                if (strcmp($row['customer_type'], 'Corporate') == 0) {
                    $track->addChild('monthlyCreditLimit', $row['customer_monthly_credit_limit']);
                }
            }


            Header('Content-type: text/xml');
            print($xml->asXML());
        }
    }

}

?>
