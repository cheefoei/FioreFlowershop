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
        $customer_name = null;
        if ($customer instanceof Customer) {
            $customer_id = $customer->getId();
            $customer_name = $customer->getFname() . " " . $customer->getLname();
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
        $track = $xml->addChild('invoice');

        $invoice_id = null;
        while ($row = $invoice_stmt->fetch()) {
            $invoice_id = $row['invoice_id'];
            $track->addAttribute('invoiceID', $row['invoice_id']);
            $track->addChild('month', date('F', mktime(0, 0, 0, $row['invoice_month'], 10)));
            $track->addChild('year', $row['invoice_year']);
            $track->addChild('customerID', $row['customer_id']);
            $track->addChild('customerName', $customer_name);
            $track->addChild('createdDate', $row['date_created']);
            $track->addChild('invoiceTotalAmount', number_format((float) $row['invoice_total_amount'], 2, '.', ''));

            if ($row['invoice_isPaid'] == 0) {
                $track->addChild('status', "Unpaid");
            } else {
                $track->addChild('status', "Paid");
            }
        }

        //Get order content
        $order_stmt = $this->conn->prepare("SELECT floral_order.id, DATE_FORMAT(floral_order.date, '%d %M %Y') AS 'order_date', product.product_name, product.price, order_list.quantity,  (product.price * order_list.quantity) AS 'total_amount' 
            FROM floral_order, order_list, product, invoice_list 
            WHERE order_list.order_id = floral_order.id AND invoice_list.order_id = floral_order.id AND order_list.product_id = product.product_id AND invoice_list.invoice_id = :invoice_id AND YEAR(`date`) = :year AND MONTH(`date`) = :month  
            ORDER BY `order_date` ASC");
        $order_stmt->execute(array(':invoice_id' => $invoice_id, ':month' => $month, ':year' => $year));

        while ($row = $order_stmt->fetch()) {
            $order = $track->addChild('order');
            $order->addChild('orderID', $row['id']);
            $order->addChild('orderDate', $row['order_date']);
            $order->addChild('productName', $row['product_name']);
            $order->addChild('price', number_format((float) $row['price'], 2, '.', ''));
            $order->addChild('quantity', $row['quantity']);
            $order->addChild('totalAmount', number_format((float) $row['total_amount'], 2, '.', ''));
        }

        Header('Content-type: text/xml');
        print($xml->asXML());
    }

}

?>
